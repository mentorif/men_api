<?php

namespace App\Model;

use App\Lib\Common\Utility;
use Illuminate\Database\Eloquent\Model;

class Industrial extends Model
{
    protected $hidden = ['pivot','updated_at','deleted_at','created_at'];
    protected $softDelete = true;

    protected $table = 'industry_master';

    public static function getIndustries($reset_cache = false) {

        $key = \Config::get('rediskeys.red_industry_master');
        $data = Utility::getRedisKey($key);
        if (empty($data) || $reset_cache === true) {
            $data = self::select('id','name')->where('status','act')->whereNull('deleted_at')->orderBy('shown_order', 'ASC')->orderBy('name', 'ASC')->get();
            if (!empty($data)) {
                Utility::setRedisKey($key, $data);
            }
        }
        return $data;

    }

    public static function isValidIndustry($id) {
        $query = self::whereNull('deleted_at')->where('status','act');
        if (is_array($id)) {
            $query->whereIn('id', $id);
        } else {
            $query->where('id', $id);
        }
        $count = $query->count();
        if ( (is_array($id) && count($id) == $count) || (!is_array($id) && $count > 0 )) {
            return true;
        }
        return false;
    }
}
