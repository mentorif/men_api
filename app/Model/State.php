<?php

namespace App\Model;

use App\Lib\Common\Utility;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $hidden = ['pivot','updated_at','deleted_at','created_at','shown_order','status'];
    protected $softDelete = true;

    protected $table = 'state_master';

    public function cities() {
        return $this->hasMany('App\Model\City','state_id')
            ->whereNull('deleted_at')
            ->orderBy('shown_order', 'ASC')
            ->orderBy('name','ASC');
    }

    public function scopeWithCities($query) {
        return $query->with('cities');
    }

    public function country() {
        return $this->belongsTo('App\Model\Country','country_id', 'id');
    }

    public function scopeWithCountries($query) {
        return $query->with('country');
    }

    public function getStatusAttribute($value) {
        return Utility::getStatusConversion($value);
    }

    public function scopeWithCountryId($query, $id) {
        if (is_array($id)) {
            return $query->whereIn('country_id', $id);
        } else {
            return $query->where('country_id', $id);
        }
    }

    public static function getCountryState($cid = '', $reset_cache = false) {

        if (empty($cid))
            return NULL;
        $key = str_ireplace('CCODE',$cid, \Config::get('rediskeys.red_country_state'));
        $data = Utility::getRedisKey($key);
        if (empty($data) || $reset_cache === true) {
            $data = self::withCountryId($cid)->whereNull('deleted_at')->where('status','act')->get()->toArray();
            Utility::setRedisKey($key, $data);
        }
        return $data;
    }

    public static function isValidState($sid, $cid = '') {

        $query = self::where('id', $sid);
        if (!empty($cid)) {
            $query->where('country_id', $cid);
        }
        $count = $query->whereNull('deleted_at')->where('status','act')->count();
        if ($count > 0) {
            return true;
        }
        return false;
    }
}
