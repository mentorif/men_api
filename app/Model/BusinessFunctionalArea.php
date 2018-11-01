<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessFunctionalArea extends Model
{
    //use SoftDeletes;

    protected $hidden = ['pivot','updated_at','deleted_at','created_at'];

    protected $table = 'business_functional_area';

    protected $fillable = ['bd_id','fa_id','uid'];
    //protected $dates = ['deleted_at'];

    public function business_detail() {
        return $this->belongsTo('App\Model\BusinessDetail','bd_id', 'id')
            ->whereNull('deleted_at');
    }

    public function scopeWithBusinessDetail($query) {
        return $query->with('business_detail');
    }

    public function functional_area() {
        return $this->belongsTo('App\Model\FunctionalArea','fa_id', 'id')
            ->whereNull('functional_area.deleted_at')->where('functional_area.status','act');
    }

    public function scopeWithFunctionalArea($query) {
        return $query->with('functional_area');
    }


    public static function addFunctionalAreaToBusiness(&$bdObj, array $fid) {

        $data = [];$count = 0;
        if (count($fid) > 0) {
            $bdObj->business_function_area()->delete();
            foreach ($fid as $id) {
                $data[$count] = ['bd_id' => $bdObj->id,'fa_id' => $id,'uid' => $bdObj->uid];
                $count++;
            }
        }
        if (count($data) > 0) {
            return $bdObj->business_function_area()->createMany($data);
        }
        return false;
    }
}
