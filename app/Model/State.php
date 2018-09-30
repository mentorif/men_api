<?php

namespace App\Model;

use App\Lib\Common\Utility;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $hidden = ['pivot','updated_at','deleted_at','created_at','shown_order','country_id','status'];
    protected $softDelete = true;

    protected $table = 'state_master';

    public function cities() {
        return $this->hasMany('App\Model\City','state_id')
            ->whereNull('deleted_at')
            ->orderBy('shown_order', 'ASC')
            ->orderBy('name','ASC');
    }

    public function scopeWithCities($query) {
        return $query->with('cities');
    }

    public function country() {
        return $this->belongsTo('App\Model\Country','country_id', 'id');
    }

    public function scopeWithCountries($query) {
        return $query->with('country');
    }

    public function getStatusAttribute($value) {
        return Utility::getStatusConversion($value);
    }
}
