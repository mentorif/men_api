<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserPersonalInfo extends Model
{
    protected $hidden = ['pivot','updated_at','deleted_at','created_at'];
    protected $softDelete = true;
    protected $table = 'user_personal_info';

    const ETHNICITY = ['decline','african-american','afro-caribbean','american-indian|alaskan-native','asian','caucasian','latino|hispanic','multiple-ethnicities','native-hawaiian|pacific-islander'];
    const EDUCATION = ['elementary','middle','secondary','postsecondary','bachelor','master','doctor'];
    const LANG = ['en','ar','bn','fr','de','ht','hi','id','ja','ko','pt','ru','sk','es','tl','th','vi'];
    const LANG_ASSOC = ['en' => 'English','ar' => 'Arabic','bn' => 'Bengali','fr' => 'French','de' => 'German','ht' => 'Haitian Creole','hi' => 'Hindi','id' => 'Indonesian/Malay',
        'ja' => 'Japanese','ko' => 'Korean','pt' => 'Portuguese','ru' => 'Russian','sk' => 'Slovak','es' => 'Spanish',
        'tl' => 'Tagalog','th' => 'Thai','vi' => 'Vietnamese'];


    public function user() {
        return $this->belongsTo('App\Model\User','uid', 'id');
    }

    public function scopeWithUser($query) {
        return $query->with('user');
    }

    public function country_detail() {
        return $this->belongsTo('App\Model\Country', 'birth_country_id', 'id')
            ->whereNull('country_master.deleted_at');
    }

    public function getSpokenLangAttribute($value) {

        $value = explode('|', $value);

        $data = [];
        foreach ($value as $val) {
            $data[$val] = array_get(self::LANG_ASSOC, $val,'');
        }
        return $data;
    }

    public function addMenteePersonalInfoData($data) {

        $this->birth_country_id = array_get($data,'birth_country_id');
        $this->spoken_lang = implode('|',array_get($data,'spoken_lang',[]));
        $this->m_dial_code = array_get($data,'m_dial_code');
        $this->phone_mobile = array_get($data,'phone_mobile');
        //$this->l_dial_code = array_get($data,'l_dial_code','');
        $this->phone_landline = array_get($data,'phone_landline','');
        $this->birth_year = array_get($data,'birth_year');
        $this->gender = array_get($data,'gender','M');
        $this->education_level = array_get($data,'education_level','');
        $this->ethnicity = array_get($data,'ethnicity','decline');
        //$this->imp_com_pref = array_get($data,'com_pref','mail');


        return $this->save();
    }


}
