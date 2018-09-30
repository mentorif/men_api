<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $hidden = ['pivot','updated_at','deleted_at','created_at','shown_order'];
    protected $softDelete = true;

    protected $table = 'city_master';

    public function state() {
        return $this->belongsTo('App\Model\State','state_id', 'id');
    }

    public function scopeWithStates($query) {
        return $query->with('state');
    }

    public function country() {
        return $this->belongsTo('App\Model\Country','country_id', 'id');
    }

    public function scopeWithCountries($query) {
        return $query->with('country');
    }
}
