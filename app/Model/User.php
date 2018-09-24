<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $hidden = ['pivot','updated_at','deleted_at','created_at'];
    protected $softDelete = true;

    public static function addUser($data, $source = '') {

        $userObj = new self;
        $userObj->f_name = array_get($data,'f_name','');
        $userObj->l_name = array_get($data,'l_name','');
        $userObj->email = array_get($data,'email');
        $userObj->pass = self::generatePasswordHash(array_get($data,'pass'));
        $userObj->is_mentor = array_get($data,'is_mentor',0);
        $userObj->is_privacy_confirmed = array_get($data,'is_privacy_confirmed',1);
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

        return crypt($pass,  \Config::get('constants_en.pass_salt'));
    }

    public function setToken() {

        $token = crypt($this->f_name .'/'. $this->email.'/'.$this->id.'/'.$this->f_name, \Config::get('constants_en.token_salt'));
        $this->persist_code = $token;
        $this->save();
        return $token;
    }

    public static function authenticate($email, $pass) {

        $user = self::where('email', $email)->where('status','act')->whereNull('deleted_at')->first();
        if (!empty($user)) {
            if (array_get($user, 'pass') == self::generatePasswordHash($pass)) {
                unset($user['pass'], $user['status']);
                return $user;
            }
        }
        return false;
    }

}
