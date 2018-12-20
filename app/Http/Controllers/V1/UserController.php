<?php
namespace App\Http\Controllers\V1;

use App\Lib\Common\Utility;
use Flow\Exception;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Model\User;
use Lang;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UserController extends BaseController
{
    use AuthenticatesUsers;
    public function postRegister(Request $request) {
        try {
            $inputs = $request->all();

            if (!empty($inputs)) {
                // validate inputs
                $is_valid = true; $errors = [];
                if(empty($inputs['f_name'])) {
                    $is_valid = false;
                    $errors[] = 'First name is required';
                }
                if(empty($inputs['l_name'])) {
                    $is_valid = false;
                    $errors[] = 'Last name is required';
                }
                if(empty($inputs['email'])) {
                    $is_valid = false;
                    $errors[] = 'Email is required';
                }
                if(empty($inputs['pass'])) {
                    $is_valid = false;
                    $errors[] = 'Password is required';
                }
                if(empty($inputs['confirm_pass'])) {
                    $is_valid = false;
                    $errors[] = 'Confirm password is required';
                }
                if(!isset($inputs['is_mentor']) || (isset($inputs['is_mentor']) && $inputs['is_mentor'] != 0 && $inputs['is_mentor'] != 1)) {
                    $is_valid = false;
                    $errors[] = 'Mentor/Mentee is required';
                }
                if(!isset($inputs['is_privacy_confirmed'])
                    || (isset($inputs['is_privacy_confirmed']) && $inputs['is_privacy_confirmed'] != 1)) {
                    $is_valid = false;
                    $errors[] = 'Please accept the privacy policy';
                }
                if ((empty($inputs['pass']) && !empty($inputs['confirm_pass']))
                    || (!empty($inputs['pass']) && empty($inputs['confirm_pass']))
                    || ($inputs['pass'] != $inputs['confirm_pass'])
                ) {
                    $is_valid = false;
                    $errors[] = 'Confirm password does not match with password';
                }
                if (!filter_var($inputs['email'], FILTER_VALIDATE_EMAIL)) {
                    $is_valid = false;
                    $errors[] = 'Invalid email address';
                }
                if ($is_valid === true && false === Utility::validatePass($inputs['pass'])) {
                    $is_valid = false;
                    $errors[] = 'Please choose a valid password';
                }
                if (true === User::isDuplicateEmail(array_get($inputs,'email',''))) {
                    $is_valid = false;
                    $errors[] = 'Account with same email already exists';
                }

                if (true === $is_valid) {

                    $userObj = User::addUser($inputs);
                    $token = $userObj->setToken();
                    $data = [
                        'user_id' => $userObj->id,
                        'token' => $token
                    ];
                    return Utility::sendSuccess($data, Lang::get('auth.register_success'));
                } else {
                    return Utility::sendFailed($errors);
                }
            } else {
                return Utility::sendFailed(Lang::get('message.invalid_inputs'));
            }
        } catch (\Exception $e) {
            //@todo: Log exception
            return Utility::sendFailed(Lang::get('auth.register_failed'));

        }
    }

    public function postSignIn(Request $request) {
        try {
            $inputs = $request->all();
            if (!empty($inputs)) {
                $is_valid = true; $errors = [];
                if (empty(array_get($inputs, 'email','')) || empty(array_get($inputs, 'pass',''))) {
                    $is_valid = false;
                    $errors[] = Lang::get('auth.login_input_error');
                }
                if (true === $is_valid) {
                    $user = User::authenticate(array_get($inputs, 'email',''),array_get($inputs, 'pass',''));
                    if (false === $user) {
                        return Utility::sendFailed([Lang::get('auth.login_failed')]);
                    }
                    return Utility::sendSuccess($user, Lang::get('auth.login_success'));
                } else {
                    return Utility::sendFailed($errors);
                }
            } else {
                return Utility::sendFailed(Lang::get('message.invalid_inputs'));
            }
        } catch (\Exception $e) {
            //@todo: Log exception
            return Utility::sendFailed($e->getMessage());
        }
    }

}