<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ExpertDetail extends Model
{
    protected $hidden = ['pivot','updated_at','deleted_at','created_at'];
    protected $softDelete = true;

    protected $table = 'expert_detail';

    public function function_area() {
        return $this->hasMany('App\Model\ExpertFunctionalArea','expert_id')
            ->whereNull('expert_functional_area.deleted_at')->where('expert_functional_area.status','act');
    }

    public function country_experience() {
        return $this->hasMany('App\Model\ExpertCountryExperience','expert_id')
            ->whereNull('expert_country_experience.deleted_at');
    }

    public function personalinfo() {
        return $this->hasOne('App\Model\UserPersonalInfo','uid','uid')
            ->whereNull('user_personal_info.deleted_at');
    }

    public function scopeWithPersonalInfo($query) {
        return $query->with('personalinfo');
    }

    public function industry_detail() {
        return $this->belongsTo('App\Model\Industrial','industry_id','id')
            ->whereNull('industry_master.deleted_at');
    }

    public function getPreferenceAttribute($value) {

        $d = $value;
        if (!empty($d)) {
            return explode('|', $d);
        }
        return $d;
    }

    public static function addExpertDetail(&$userObj, $data) {

        $expertObj = self::where('uid',$userObj->id)->first();
        if (empty($expertObj)) {
            $expertObj = new self;
            $expertObj->uid = $userObj->id;
        }

        $expertObj->industry_id = array_get($data,'mentor_industry_id');
        $expertObj->professional_bio = array_get($data,'mentor_professional_bio');
        $expertObj->entrepreneur_pitch= array_get($data,'mentor_entrepreneur_pitch');
        $expertObj->preference = implode('|',array_get($data,'mentor_mentoring_stages',[]));
        $expertObj->years_management = array_get($data,'mentor_years_management');
        $expertObj->years_ownership = array_get($data,'mentor_years_ownership');
        $expertObj->website = array_get($data,'mentor_website_url','');
        $expertObj->company = array_get($data,'mentor_business_name','');
        $expertObj->role = array_get($data,'mentor_title','');

        if($expertObj->save()) {
            return $expertObj;
        }
        return false;
    }

    public static function getExpertInfo($userObj, array $params = []) {

        $expertObj = self::where('uid', $userObj->id);
        $with = ['function_area','function_area.functional_area',
            'function_area.functional_area.functionalareagroup','country_experience','country_experience.country_detail'];
        if(1 == array_get($params,'personal_info', 0)) {
            array_push($with,'personalinfo');
        }
        return $expertObj->with($with)->first()->toArray();
    }
}
