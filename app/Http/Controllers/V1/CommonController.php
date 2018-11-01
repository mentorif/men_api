<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\BaseController;
use App\Lib\Common\Utility;
use App\Model\Country;
use App\Model\State;
use Illuminate\Http\Request;

class CommonController extends BaseController
{
    public function getCountryRegion(Request $request) {
        try {
            $inputs = $request->all();
            if (!empty($inputs['ccode']) && strlen($inputs['ccode']) == 2) {
                $regions = Country::getCountryState($inputs['ccode'], true);
                return Utility::sendSuccess($regions, Lang::get('message.success_save_data'));
            }
            if (!empty($inputs['cid'])) {
                $regions = State::getCountryState($inputs['cid'], true);
                return Utility::sendSuccess($regions);
            }
            return Utility::sendFailed(Lang::get('message.invalid_inputs'), \Config::get('constants_en.code.code_failed'));
        } catch (Exception $e) {

            //@todo: Log exception
            return Utility::sendFailed(Lang::get('message.exception_default_error_message'));
        }
    }

    public function getCountries(Request $request) {
        try {
            $inputs = $request->all();
            $countries = Country::getCountry();
            return Utility::sendSuccess($countries);
        } catch (Exception $e) {

            //@todo: Log exception
            return Utility::sendFailed(Lang::get('message.exception_default_error_message'));
        }
    }
}
