<?php

namespace App\Model;

use App\Lib\Common\Utility;
use Illuminate\Database\Eloquent\Model;

class FunctionalAreaGroup extends Model
{
    protected $hidden = ['pivot','updated_at','deleted_at','created_at','shown_order'];
    protected $softDelete = true;

    protected $table = 'functional_area_group';

    public function functionalarea() {
        return $this->hasMany('App\Model\FunctionalArea','functional_group_id', 'id')
            ->whereNull('deleted_at')
            ->orderBy('shown_order', 'ASC')
            ->orderBy('name','ASC');
    }

    public function scopeWithFunctionalArea($query) {
        return $query->with('functionalarea');
    }

    public static function getFunctionalArea($status = [], $reset_cache = false) {

        if (empty($status)) {
            $status = ['act'];
        }
        $key = \Config::get('rediskeys.red_functional_area_master');
        $data = Utility::getRedisKey($key);
        if (empty($data) || $reset_cache === true) {
            $data = self::withFunctionalArea()->whereNull('deleted_at')->whereIn('status',$status)->get();
            Utility::setRedisKey($key, $data);
        }
        return $data;
    }

    public function getStatusAttribute($value) {
        return Utility::getStatusConversion($value);
    }
}
