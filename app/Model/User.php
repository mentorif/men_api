<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // @todo: persist_code should be hidden to return in response, unless specifically mentioned in api call
    protected $hidden = ['pivot','updated_at','deleted_at','created_at','email','pass','remember_token'];

    protected $softDelete = true;

    protected $exclude_fields = ['persist_code'];

    public function personalinfo() {
        return $this->hasOne('App\Model\UserPersonalInfo','uid')
            ->whereNull('deleted_at');
    }

    public function scopeWithPersonalInfo($query) {
        return $query->with('personalinfo');
    }

    public function businessinfo() {
        return $this->hasOne('App\Model\BusinessDetail','uid')
            ->whereNull('business_detail.deleted_at');
    }

    public function scopeWithBusinessInfo($query) {
        return $query->with('businessinfo');
    }

    public function expertinfo() {
        return $this->hasOne('App\Model\ExpertDetail','uid')
            ->whereNull('expert_detail.deleted_at');
    }

    public function scopeWithExpertInfo($query) {
        return $query->with('expertinfo');
    }

    public static function addUser($data, $source = '') {

        $userObj = new self;
        $userObj->f_name = array_get($data,'f_name','');
        $userObj->l_name = array_get($data,'l_name','');
        $userObj->email = array_get($data,'email');
        $userObj->pass = self::generatePasswordHash(array_get($data,'pass'));
        $userObj->is_mentor = array_get($data,'is_mentor',0);
        $userObj->is_privacy_confirmed = array_get($data,'is_privacy_confirmed',1);
        if (1 === array_get($data,'is_mentor',0)) {
            $userObj->is_term_condition_confirmed = 1;
        }
        switch ($source) {
            case 'fb':
                $userObj->acc_creation_method = 'fb';
                break;
            case 'in':
                $userObj->acc_creation_method = 'in';
                break;
            case 'gp':
                $userObj->acc_creation_method = 'gp';
                break;
            default:
                $userObj->acc_creation_method = 'ml';
        }
        $userObj->save();
        return $userObj;

    }

    public static function isDuplicateEmail($email) {

        $c = self::where('email', $email)->count();
        if($c == 0) {
            return false;
        }
        return true;
    }

    public static function generatePasswordHash($pass) {

        return crypt($pass, '$5$rounds=5000$'.\Config::get('constants_en.token_salt').'$');
    }

    public function setToken() {

        $token = self::generatePasswordHash($this->f_name .'/'. $this->email.'/'.$this->id.'/'.$this->f_name);
        $this->persist_code = $token;
        $this->save();
        return $token;
    }

    public static function authenticate($email, $pass) {

        $user = self::where('email', $email)->where('status','act')->whereNull('deleted_at')->with('personalinfo')->first();
        if (!empty($user)) {
            if (array_get($user, 'pass') == self::generatePasswordHash($pass)) {
                unset($user['pass'], $user['status']);
                return $user;
            }
        }
        return false;
    }

    public function addVentureData($data) {

        $businessDetailObj = BusinessDetail::addBusinessDetail($data, $this);
        if ($businessDetailObj instanceof BusinessDetail) {
            $out = BusinessFunctionalArea::addFunctionalAreaToBusiness($businessDetailObj, array_get($data, 'business_functional_area'));
            if (false === $out) {
                return \Lang::get('message.f_break');
            }
            $out1 = BusinessAddress::addBusinessAddress($businessDetailObj, $data);
            if (false === $out1) {
                return \Lang::get('message.ba_break');
            }
            if (!empty(array_get($data,'business_website',[]))) {
                $out2 = BusinessPromotionAddress::addBusinessPromotionAddress($businessDetailObj, array_get($data,'business_website'));
                if (false === $out2) {
                    return \Lang::get('message.pa_break');
                }
            }
            $this->is_acc_setup_done = 1;
            $this->save();
            return true;
        }
        return \Lang::get('bd_break');;
    }

    public function addProfilePic($path) {

        $this->profile_pic_path = $path;
        $this->is_profile_image_done = 1;
        $this->save();
        return true;

    }

    public function addPersonalInfo($data) {

        $userPersonalInfoObj = $this->personalinfo()->first();
        if (empty($userPersonalInfoObj)) {
            $userPersonalInfoObj = new UserPersonalInfo();
            $userPersonalInfoObj->uid = $this->id;
        }
        if ($this->is_mentor === 0) {
            $saved = $userPersonalInfoObj->addMenteePersonalInfoData($data);
            if ($saved) {
                $this->intent_to_connect = array_get($data,'intent_to_connect','Y');
                $this->save();
                return true;
            }

        } else {
            $saved = $userPersonalInfoObj->addMentorPersonalInfoData($data);
            if ($saved) {
                return true;
            }
        }
        return false;

    }

    public function getPersonalInfo() {

        $d =  $this->personalinfo()->with(['country_detail'])->first();
        if (!empty($d)) {
            $d = $d->toArray();
            $d['intent_to_connect'] = $this->intent_to_connect;
            return $d;
        }

        return false;
    }

    public function getBusinessInfo(array $params = []) {

        $with = [];
        if(1 == array_get($params,'business_info', 0)) {
            array_push($with,'businessinfo','businessinfo.industry_detail','businessinfo.business_function_area','businessinfo.business_function_area.functional_area',
                'businessinfo.business_function_area.functional_area.functionalareagroup','businessinfo.business_address','businessinfo.business_address.country_detail',
                'businessinfo.business_address.state_detail','businessinfo.business_promotion_address');
        }
        if(1 == array_get($params,'personal_info', 0)) {
            array_push($with,'personalinfo');
        }
        return self::with($with)->where('id', $this->id)->first()->toArray();
    }

    public function publishAccount() {

        if (true === $return = $this->isUserValidToPublish()) {
            $this->visibility = 'pub';
            $this->last_publish_date = date('Y-m-d H:i:s');
            $this->save();
            return true;
        }
        return $return;

    }

    public function isUserValidToPublish()
    {
        if ($this->is_privacy_confirmed == 1 && $this->is_term_condition_confirmed == 1 &&
            $this->is_code_conduct_confirmed == 1 && $this->is_profile_image_done == 1 &&
            $this->personalinfo()->count() > 0) {
            // settings are done, ready to publish

            if (in_array($this->status, ['act'])) {
                if (in_array($this->visibility, ['pri'])) {
                    return true;
                }
                return \Lang::get('message.already_published');
            }
            return \Lang::get('message.disabled_account');
        }
        return \Lang::get('message.settings_incomplete');
    }

    public function addExpertData($inputs) {

        $expertObj = ExpertDetail::addExpertDetail($this, $inputs);
        if (!empty($expertObj->id)) {
            $expertCountryExperience = ExpertCountryExperience::addCountryToExpert($expertObj,array_get($inputs,'mentor_country_expertise_id'));
            $expertFunctionalExperience = ExpertFunctionalArea::addFunctionalAreaToExpert($expertObj,array_get($inputs, 'mentor_selected_expertises'));
            $personalInfo = $this->addPersonalInfo($inputs);
            if (false !== $expertCountryExperience && false !== $expertFunctionalExperience && false !== $personalInfo) {
                if (!empty(array_get($inputs,'mentor_photo_upload',''))) {
                    $this->addProfilePic(array_get($inputs,'mentor_photo_upload'));
                }
                $this->is_acc_setup_done = 1;
                $this->save();
                return true;
            }
        }
        return \Lang::get('message.expert_data_save_issue');
    }

    public function getExpertInfo(array $params = []) {

        $with = [];
        if(1 == array_get($params,'expert_info', 0)) {
            array_push($with,'expertinfo','expertinfo.industry_detail','expertinfo.function_area','expertinfo.function_area.functional_area',
                'expertinfo.function_area.functional_area.functionalareagroup','expertinfo.country_experience','expertinfo.country_experience.country_detail');
        }
        if(1 == array_get($params,'personal_info', 0)) {
            array_push($with,'expertinfo.personalinfo','expertinfo.personalinfo.country_detail','expertinfo.personalinfo.state_detail','expertinfo.personalinfo.city_detail');
        }
        return self::with($with)->where('id', $this->id)->first()->toArray();
    }
}
