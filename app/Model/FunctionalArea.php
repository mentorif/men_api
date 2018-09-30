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
}
