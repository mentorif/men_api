<?php

namespace App\Model;

use App\Lib\Common\Utility;
use Illuminate\Database\Eloquent\Model;

class FunctionalArea extends Model
{
    protected $hidden = ['pivot','updated_at','deleted_at','created_at','shown_order'];
    protected $softDelete = true;

    protected $table = 'functional_area';


    public function functionalareagroup() {
        return $this->belongsTo('App\Model\FunctionalAreaGroup', 'functional_group_id')
            ->whereNull('deleted_at');
    }

    public function scopeWithFunctionalAreaGroup($query) {
        return $query->with('functionalareagroup')->where('');
    }

    public function getStatusAttribute($value) {
        return Utility::getStatusConversion($value);
    }

    public static function isValidFunctionalArea($id) {
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
