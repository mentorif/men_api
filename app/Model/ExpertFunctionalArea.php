<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ExpertFunctionalArea extends Model
{
    protected $hidden = ['pivot','updated_at','deleted_at','created_at'];
    protected $softDelete = true;

    protected $table = 'expert_functional_area';

    protected $fillable = ['expert_id','fa_id','uid'];

    public function functional_area() {
        return $this->belongsTo('App\Model\FunctionalArea','fa_id', 'id')
            ->whereNull('functional_area.deleted_at')->where('functional_area.status','act');
    }

    public function scopeWithFunctionalArea($query) {
        return $query->with('functional_area');
    }

    public static function addFunctionalAreaToExpert(&$expertObj, array $fid) {

        $data = [];$count = 0;
        if (count($fid) > 0) {
            $expertObj->function_area()->delete();
            foreach ($fid as $id) {
                $data[$count] = ['expert_id' => $expertObj->id, 'fa_id' => $id,'uid' => $expertObj->uid];
                $count++;
            }
        }
        if (count($data) > 0) {
            return $expertObj->function_area()->createMany($data);
        }
        return false;
    }
}
