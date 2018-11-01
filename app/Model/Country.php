<?php

namespace App\Model;

use App\Lib\Common\Utility;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $hidden = ['pivot','updated_at','deleted_at','created_at','shown_order','status'];
    protected $softDelete = true;

    protected $table = 'country_master';

    public function states() {
        return $this->hasMany('App\Model\State','country_id')
            ->whereNull('deleted_at')
            ->orderBy('shown_order', 'ASC')
            ->orderBy('name','ASC');
    }

    public function scopeWithStates($query) {
        return $query->with('states');
    }

    public function scopeWithCountryCode($query, $code) {
        return $query->where(function($q) use($code){
            $q->where('code',$code);
        });
    }

    public function scopeWithCountryId($query, $id) {
        return $query->where(function($q) use($id){
            $q->where('id',$id);
        });
    }

    public function getStatusAttribute($value) {
        return Utility::getStatusConversion($value);
    }

    public static function getCountry($status = [], $reset_cache = false) {
        if (empty($status)) {
            $status = ['act'];
        }
        $key = \Config::get('rediskeys.red_country_master');
        $data = Utility::getRedisKey($key);
        if (empty($data) || $reset_cache === true) {
            $data = self::whereNull('deleted_at')->whereIn('status',$status)->orderBy('shown_order','ASC')->orderBy('name','ASC')->get()->toArray();
            Utility::setRedisKey($key, $data);
        }
        return $data;
    }

    public static function getCountryState($country_code = '', $reset_cache = false) {

        if (empty($country_code) || strlen($country_code) != 2)
            return NULL;
        $key = str_ireplace('CCODE',$country_code, \Config::get('rediskeys.red_country_state'));
        $data = Utility::getRedisKey($key);
        if (empty($data) || $reset_cache === true) {
            $data = self::with('states')->withCountryCode($country_code)->whereNull('deleted_at')->where('status','act')->get()->toArray();
            Utility::setRedisKey($key, $data);
        }
        return $data;
    }

    public static function isValidCountry($id) {

        $count = self::where('id', $id)->whereNull('deleted_at')->where('status','act')->count();
        if ($count > 0) {
            return true;
        }
        return false;
    }
}
