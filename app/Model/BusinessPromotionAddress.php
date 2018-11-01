<?php

namespace App\Model;

use App\Lib\Common\Utility;
use Illuminate\Database\Eloquent\Model;

class BusinessPromotionAddress extends Model
{
    protected $hidden = ['pivot','updated_at','deleted_at','created_at'];

    protected $table = 'business_promotion_address';

    protected $fillable = ['bd_id','uid','url', 'type'];

    public function business_detail() {
        $this->belongsTo('App\Model\BusinessDetail','bd_id', 'id')
            ->whereNull('deleted_at');
    }

    public function scopeWithBusinessDetail($query) {
        return $query->with('business_detail');
    }

    public static function addBusinessPromotionAddress($bdObj, array $data) {

        $count = 0;
        if (count($data) > 0) {
            $bdObj->business_promotion_address()->delete();
            foreach ($data as $dd) {
                if (!empty(array_get($dd, 'url','')) && !empty(array_get($dd, 'type',''))) {
                    $data[$count] = ['bd_id' => $bdObj->id,'uid' => $bdObj->uid, 'url' => Utility::encodeurl(array_get($dd, 'url')), 'type' => array_get($dd, 'type')];
                    $count++;
                }
            }
            if (count($data) > 0) {
                return $bdObj->business_promotion_address()->createMany($data);
            }
        }
        return false;
    }

    public function getUrlAttribute($value) {
        return urldecode($value);
    }
}
