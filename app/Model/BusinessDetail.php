<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Lib\Common\Utility;

class BusinessDetail extends Model
{
    protected $hidden = ['pivot','updated_at','deleted_at','created_at'];
    protected $softDelete = true;

    protected $table = 'business_detail';

    protected $appends = ['stage_txt'];

    CONST STAGE = ['profitable','idea','revenue','operational','other'];
    CONST TYPE = ['profitable','nonprofitable','social','unsure','other'];
    CONST WEBSITE_TYPE = ['active_website','linkedin','facebook','twitter','other'];


    public function business_function_area() {
        return $this->hasMany('App\Model\BusinessFunctionalArea','bd_id')
            ->whereNull('business_functional_area.deleted_at')->where('business_functional_area.status','act');
    }

    public function business_address() {
        return $this->hasOne('App\Model\BusinessAddress','bd_id')
            ->whereNull('business_address.deleted_at');
    }

    public function business_promotion_address() {
        return $this->hasMany('App\Model\BusinessPromotionAddress','bd_id')
                ->whereNull('business_promotion_address.deleted_at');
    }

    public function industry_detail() {
        return $this->belongsTo('App\Model\Industrial','industry_id','id')
            ->whereNull('deleted_at');
    }

    public function scopeWithBusinessAddress($query, $bd_id = '') {
        if (!empty($bd_id)) {
            if(is_array($bd_id)) {
                return $query->with('business_address')->where(function($q) use($bd_id){
                    $q->whereIn('id',$bd_id);
                });
            } else {
                return $query->with('business_address')->where(function($q) use($bd_id){
                    $q->where('id',$bd_id);
                });
            }
        }
        return $query->with('business_address');
    }

    public function scopeWithBusinessArea($query, $bd_id = '') {
        if (!empty($bd_id)) {
            if(is_array($bd_id)) {
                return $query->with('business_function_area')->where(function($q) use($bd_id){
                    $q->whereIn('id',$bd_id);
                });
            } else {
                return $query->with('business_function_area')->where(function($q) use($bd_id){
                    $q->where('id',$bd_id);
                });
            }
        }
        return $query->with('business_area');
    }

    public function scopeWithBusinessPromotionAddress($query, $bd_id = '') {
        if (!empty($bd_id)) {
            if(is_array($bd_id)) {
                return $query->with('business_promotion_address')->where(function($q) use($bd_id){
                    $q->whereIn('id',$bd_id);
                });
            } else {
                return $query->with('business_promotion_address')->where(function($q) use($bd_id){
                    $q->where('id',$bd_id);
                });
            }
        }
        return $query->with('business_promotion_address');
    }

    public static function addBusinessDetail($data, $userObj) {

        $businessDetailObj = self::where('uid',$userObj->id)->first();
        if (empty($businessDetailObj)) {
            $businessDetailObj = new self;
            $businessDetailObj->uid = $userObj->id;
        }
        $businessDetailObj->type = array_get($data,'business_type');
        $businessDetailObj->type_other = array_get($data,'business_type_other','');
        $businessDetailObj->name = array_get($data,'business_name','');
        $businessDetailObj->stage = array_get($data,'business_stage');
        $businessDetailObj->stage_other = array_get($data,'business_stage_other','');
        $businessDetailObj->launch_month = array_get($data,'business_launch_month');
        $businessDetailObj->launch_year = array_get($data,'business_launch_year');
        $businessDetailObj->industry_id = array_get($data,'business_industry');
        $businessDetailObj->description = Utility::escapeInput(array_get($data,'business_description'));
        $businessDetailObj->request = Utility::escapeInput(array_get($data,'business_offer'));

        if ($businessDetailObj->save()) {
            return $businessDetailObj;
        }
        return false;
    }

    public static function getUserBusinessDetails($userObj) {

        return self::where('uid', $userObj->id)
            ->with(['business_function_area.functional_area','business_address.country_detail','business_address.state_detail','business_promotion_address'])
            ->first();
    }

    public function getDescriptionAttribute($value) {
        return Utility::unescapeInput($value);
    }

    public function getStageTxtAttribute() {

        if(in_array($this->attributes['stage'], self::STAGE))  {
            switch ($this->attributes['stage']) {
                case 'profitable':
                    $value = 'at scale and profitable';
                    break;
                case 'idea': break;
                    $value = 'at Idea Stage';
                    break;
                case 'revenue':
                    $value = 'operational and profitable';
                    break;
                case 'operational':
                    $value = 'operational, but no revenue';
                    break;
                default:
            }
        }
        return $value;
    }
}
