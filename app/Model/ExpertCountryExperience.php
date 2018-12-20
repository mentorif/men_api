<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ExpertCountryExperience extends Model
{
    protected $hidden = ['pivot','updated_at','deleted_at','created_at'];
    protected $softDelete = true;

    protected $table = 'expert_country_experience';

    protected $fillable = ['expert_id','country_id','uid'];

    public function country_detail() {
        return $this->belongsTo('App\Model\Country','country_id','id')
            ->whereNull('country_master.deleted_at')
            ->where('country_master.status','act');
    }

    public static function addCountryToExpert(&$expertObj, array $cid) {

        $data = [];$count = 0;
        if (count($cid) > 0) {
            $expertObj->country_experience()->delete();
            foreach ($cid as $id) {
                $data[$count] = ['expert_id' => $expertObj->id, 'country_id' => $id,'uid' => $expertObj->uid];
                $count++;
            }
        }
        if (count($data) > 0) {
            return $expertObj->country_experience()->createMany($data);
        }
        return false;
    }
}
