<?php

namespace App\Model;

use App\Lib\Common\Utility;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $hidden = ['pivot','updated_at','deleted_at','created_at','shown_order'];
    protected $softDelete = true;

    protected $table = 'city_master';

    public function state() {
        return $this->belongsTo('App\Model\State','state_id', 'id');
    }

    public function scopeWithStates($query) {
        return $query->with('state');
    }

    public function country() {
        return $this->belongsTo('App\Model\Country','country_id', 'id');
    }

    public function scopeWithCountries($query) {
        return $query->with('country');
    }

    public function scopeWithStateId($query, $id) {
        if (is_array($id)) {
            return $query->whereIn('state_id', $id);
        } else {
            return $query->where('state_id', $id);
        }
    }

    public function scopeWithCountryId($query, $id) {
        if (is_array($id)) {
            return $query->whereIn('country_id', $id);
        } else {
            return $query->where('country_id', $id);
        }
    }

    public static function getStateCity($sid, $cid = '', $reset_cache = false) {

        if (empty($sid))
            return NULL;
        $key = str_ireplace('SCODE',$sid, \Config::get('rediskeys.red_country_state_city'));
        $data = Utility::getRedisKey($key);
        if (empty($data) || $reset_cache === true) {
            $query = self::withStateId($sid);
            if (!empty($cid)) {
                $query->withCountryId($cid);
            }
            $data = $query->whereNull('deleted_at')->where('status','act')->get()->toArray();
            Utility::setRedisKey($key, $data);
        }
        return $data;
    }
}
