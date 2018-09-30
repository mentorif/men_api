<?php
namespace App\Http\Controllers\V1;

use App\Lib\Common\Utility;
use App\Model\Country;
use App\Model\FunctionalArea;
use App\Model\FunctionalAreaGroup;
use App\Model\Industrial;
use Flow\Exception;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Model\User;
use Lang;

class AccountController extends BaseController
{

    public function postCodeConduct(Request $request) {
        try {
            $inputs = $request->all();
            $userObj = false;
            if (!empty(array_get($inputs,'mf_token', ''))) {
                $userObj = $this->getUser(array_get($inputs,'mf_token', ''));
                if (false === $userObj) {
                    return Utility::sendFailed(\Config::get('constants_en.txt.txt_unauthorized_request'), \Config::get('constants_en.code.code_unauthorized_request'));
                }
            }
            if (1 == array_get($inputs,'coc_confirmed', 0)) {

                $userObj->is_code_conduct_confirmed = 1;
                $userObj->save();
                unset($userObj, $inputs);
                return Utility::sendSuccess('', Lang::get('message.success_save_data'));
            }
            return Utility::sendFailed(Lang::get('message.invalid_inputs'), \Config::get('constants_en.code.code_failed'));
        } catch (Exception $e) {
            //@todo: Log exception
            return Utility::sendFailed(Lang::get('message.exception_default_error_message'));

        }
    }

    public function postTermsCond(Request $request) {
        try {
            $inputs = $request->all();
            $userObj = false;
            if (!empty(array_get($inputs,'mf_token', ''))) {
                $userObj = $this->getUser(array_get($inputs,'mf_token', ''));
                if (false === $userObj) {
                    return Utility::sendFailed(\Config::get('constants_en.txt.txt_unauthorized_request'), \Config::get('constants_en.code.code_unauthorized_request'));
                }
            }
            if (1 == array_get($inputs,'terms_confirmed', 0)) {

                $userObj->is_term_condition_confirmed = 1;
                $userObj->save();
                unset($userObj, $inputs);
                return Utility::sendSuccess('', Lang::get('message.success_save_data'));
            }
            return Utility::sendFailed(Lang::get('message.invalid_inputs'), \Config::get('constants_en.code.code_failed'));
        } catch (Exception $e) {
            //@todo: Log exception
            return Utility::sendFailed(Lang::get('message.exception_default_error_message'));

        }
    }

    public function getVentureFormData(Request $request) {
        try {

                $industries = Industrial::getIndustries();
                $functional_area = FunctionalAreaGroup::getFunctionalArea();
                return Country::getCountryState('US');
        } catch (Exception $e) {

            //@todo: Log exception
            return Utility::sendFailed(Lang::get('message.exception_default_error_message'));
        }
    }


}