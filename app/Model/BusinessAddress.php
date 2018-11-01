<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessAddress extends Model
{
    //use SoftDeletes;
    protected $hidden = ['pivot','updated_at','deleted_at','created_at'];

    protected $table = 'business_address';

    protected $fillable = ['bd_id','uid','country_id','state_id','city','pincode'];
    //protected $dates = ['deleted_at'];

    public function business_detail() {
        return $this->belongsTo('App\Model\BusinessDetail','bd_id', 'id')
            ->whereNull('deleted_at');
    }

    public function scopeWithBusinessDetail($query) {
        return $query->with('business_detail');
    }

    public function country_detail() {
        return $this->belongsTo('App\Model\Country','country_id','id')
            ->whereNull('country_master.deleted_at')
            ->where('country_master.status','act');
    }

    public function state_detail() {
        return $this->belongsTo('App\Model\State','state_id','id')
            ->whereNull('state_master.deleted_at')
            ->where('state_master.status','act');
    }

    public static function addBusinessAddress($bdObj, $data) {

        $bdObj->business_address()->delete();
        $data = [
            'bd_id' => $bdObj->id,
            'uid' => $bdObj->uid,
            'country_id' => array_get($data, 'business_country'),
            'state_id' => array_get($data, 'business_state'),
            'city' => array_get($data, 'business_city'),
            'pincode' => array_get($data, 'business_pincode')
        ];
        return $bdObj->business_address()->create($data);
    }
}
