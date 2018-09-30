<?php
namespace App\Lib\Common;

use http\Env\Request;

class Utility {

    /*
     * Send the success message
     */
    static function sendSuccess($params, $message = '', $type = 'json') {

        if ($type == 'json') {
            return \Response::json([
                \Config::get('constants_en.txt.txt_status') => \Config::get('constants_en.txt.txt_success'),
                \Config::get('constants_en.txt.txt_code') => \Config::get('constants_en.code.code_success'),
                \Config::get('constants_en.txt.txt_message') => $message,
                \Config::get('constants_en.txt.txt_data') => is_array($params) ? $params : [$params]
            ]);
        }

    }


    /*
     * Send the failed message
     */
    static function sendFailed($errors,  $code = null, $type= 'json') {

        if ($type == 'json') {
            return \Response::json([
                \Config::get('constants_en.txt.txt_status') => \Config::get('constants_en.txt.txt_failed'),
                \Config::get('constants_en.txt.txt_code') => !is_null($code) ? $code : \Config::get('constants_en.code.code_failed'),
                \Config::get('constants_en.txt.txt_errors') => is_array($errors) ? $errors : [$errors]
            ]);
        }
    }

    /*
     * Validate a password
     * As per password policy, there should be
     * one Uppercase letter, one lowercase letter
     * one number and one special character
     * length should be between 8 to 32
     */
    static function validatePass($pass) {
        if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,32}$/', $pass)) {
            return true;
        }
        return false;
    }


    static function setRedisKey($key, $data, $force = false) {
        if (!empty($data) || $force === true) {
            $redis = \Redis::connection();
            $redis->set($key, base64_encode(serialize($data)));
        }

    }

    static function getRedisKey($key) {
        $redis = \Redis::connection();
        $data = $redis->get($key);
        if (!empty($data)) {
            return unserialize(base64_decode($data));
        }
    }

    static function getStatusConversion($status) {

        switch($status) {
            case 'act':
                return 'active';
                break;
            case 'dis':
                return 'disabled';
                break;
            case 'ina':
                return 'inactive';
                break;
            default:
                return $status;
        }
    }
}