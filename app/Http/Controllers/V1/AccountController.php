<?php
namespace App\Http\Controllers\V1;

use App\Lib\Common\Utility;
use App\Model\BusinessDetail;
use App\Model\Country;
use App\Model\ExpertCountryExperience;
use App\Model\ExpertDetail;
use App\Model\ExpertFunctionalArea;
use App\Model\FunctionalArea;
use App\Model\FunctionalAreaGroup;
use App\Model\Industrial;
use App\Model\State;
use App\Model\UserPersonalInfo;
use Flow\Exception;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Validation\Rule;
use Lang;
use function PHPSTORM_META\type;

class AccountController extends BaseController
{

    public function postCodeConduct(Request $request) {
        try {
            $inputs = $request->all();
            $userObj = null;
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
        } catch (\Exception $e) {
            //@todo: Log exception
            return Utility::sendFailed(Lang::get('message.exception_default_error_message'));

        }
    }

    public function postTermsCond(Request $request) {
        try {
            $inputs = $request->all();
            $userObj = null;
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
        } catch (\Exception $e) {
            //@todo: Log exception
            return Utility::sendFailed(Lang::get('message.exception_default_error_message'));

        }
    }

    public function getVentureFormData(Request $request) {
        try {
            $inputs = $request->all();
            $userObj = null;
            if (!empty(array_get($inputs,'mf_token', ''))) {
                $userObj = $this->getUser(array_get($inputs,'mf_token', ''));
                if (false === $userObj) {
                    return Utility::sendFailed(\Config::get('constants_en.txt.txt_unauthorized_request'), \Config::get('constants_en.code.code_unauthorized_request'));
                }
            }
            $business_details = BusinessDetail::getUserBusinessDetails($userObj);
            $industries = Industrial::getIndustries();
            $functional_areas = FunctionalAreaGroup::getFunctionalArea();
            $countries = Country::getCountry();
            return Utility::sendSuccess(['business_details' => $business_details, 'industries' => $industries, 'functional_areas' => $functional_areas, 'countries' => $countries]);
        } catch (\Exception $e) {

            //@todo: Log exception
            return Utility::sendFailed(Lang::get('message.exception_default_error_message'));
        }
    }

    public function postVentureFormData(Request $request) {
        try {
            $inputs = $request->all();
            $userObj = null;
            if (!empty(array_get($inputs,'mf_token', ''))) {
                $userObj = $this->getUser(array_get($inputs,'mf_token', ''));
                if (false === $userObj) {
                    return Utility::sendFailed(\Config::get('constants_en.txt.txt_unauthorized_request'), \Config::get('constants_en.code.code_unauthorized_request'));
                }
            }
            $validator = \Validator::make($inputs,[
                'business_type' => ['required', Rule::in(BusinessDetail::TYPE)],
                'business_type_other' => 'required_if:business_type,other',
                'business_stage' => ['required', Rule::in(BusinessDetail::STAGE)],
                'business_stage_other' => 'required_if:business_stage,other',
                'business_launch_month' => ['nullable','required_unless:business_stage,idea', Rule::in([1,2,3,4,5,6,7,8,9,10,11,12])],
                'business_launch_year' => ['nullable','required_unless:business_stage,idea', 'regex:/^\d{4}$/'],
                'business_industry' => ['required','regex:/^\d+$/'],
                'business_functional_area' => 'required|array|size:3',
                'business_description' => 'required|min:150',
                'business_offer' => 'required|min:150',
                'business_country' => ['required','regex:/^\d+$/'],
                'business_state' => ['required','regex:/^\d+$/'],
                'business_city' => 'required|string|max:50',
                'business_pincode' => ['required','regex:/^\d{4,10}$/'],
                'business_website'=> ['nullable','array','max:5'],
                'business_website.0.url' => 'required_with:business_website.0.type|url',
                'business_website.0.type' => ['required_with:business_website.0.url', Rule::in(BusinessDetail::WEBSITE_TYPE)],
                'business_website.1.url' => 'required_with:business_website.1.type|url',
                'business_website.1.type' => ['required_with:business_website.1.url', Rule::in(BusinessDetail::WEBSITE_TYPE)],
                'business_website.2.url' => 'required_with:business_website.2.type|url',
                'business_website.2.type' => ['required_with:business_website.2.url', Rule::in(BusinessDetail::WEBSITE_TYPE)],
                'business_website.3.url' => 'required_with:business_website.3.type|url',
                'business_website.3.type' => ['required_with:business_website.3.url', Rule::in(BusinessDetail::WEBSITE_TYPE)],
                'business_website.4.url' => 'required_with:business_website.4.type|url',
                'business_website.4.type' => ['required_with:business_website.4.url', Rule::in(BusinessDetail::WEBSITE_TYPE)],

            ]);
            if ($validator->passes()) {
                $is_valid = true;
                if(false === Industrial::isValidIndustry(array_get($inputs,'business_industry'))) {
                    $is_valid = false;
                    $validator->getMessageBag()->add('business_industry', Lang::get('message.invalid_value'));
                }
                if (false === FunctionalArea::isValidFunctionalArea(array_get($inputs,'business_functional_area'))) {
                    $is_valid = false;
                    $validator->getMessageBag()->add('business_functional_area', Lang::get('message.some_invalid_values'));
                }
                if (false === Country::isValidCountry(array_get($inputs,'business_country'))) {
                    $is_valid = false;
                    $validator->getMessageBag()->add('business_country', Lang::get('message.invalid_value'));
                }
                if(false === State::isValidState(array_get($inputs,'business_state'), array_get($inputs,'business_country'))) {
                    $is_valid = false;
                    $validator->getMessageBag()->add('business_state', Lang::get('message.invalid_value'));
                }
                if (true === $is_valid) {
                    if (true === $return = $userObj->addVentureData($inputs)) {
                       unset($validator, $inputs);
                       return Utility::sendSuccess('', Lang::get('message.success_save_data'));
                    }
                    return Utility::sendFailed([$return], \Config::get('constants_en.code.code_failed'));
                }
            }
            return Utility::sendFailed($validator->errors(), \Config::get('constants_en.code.code_failed'));
        } catch (\Exception $e) {

            //@todo: Log exception
            return Utility::sendFailed(Lang::get('message.exception_default_error_message'));
        }
    }

    public function postProfilePic(Request $request) {
        try {
            $inputs = $request->all();
            $userObj = null;
            if (!empty(array_get($inputs,'mf_token', ''))) {
                $userObj = $this->getUser(array_get($inputs,'mf_token', ''));
                if (false === $userObj) {
                    return Utility::sendFailed(\Config::get('constants_en.txt.txt_unauthorized_request'), \Config::get('constants_en.code.code_unauthorized_request'));
                }
            }

            if (!empty(array_get($inputs,'profile_pic_path',''))) {
                $userObj->addProfilePic(array_get($inputs,'profile_pic_path'));
            }
            unset($inputs, $userObj);
            return Utility::sendSuccess('', Lang::get('message.success_save_data'));
        } catch (\Exception $e) {

            //@todo: Log exception
            return Utility::sendFailed(Lang::get('message.exception_default_error_message'));
        }
    }

    public function getMenteePersonalInfo(Request $request) {
        try {
            $inputs = $request->all();
            $userObj = null;
            if (!empty(array_get($inputs,'mf_token', ''))) {
                $userObj = $this->getUser(array_get($inputs,'mf_token', ''));
                if (false === $userObj) {
                    return Utility::sendFailed(\Config::get('constants_en.txt.txt_unauthorized_request'), \Config::get('constants_en.code.code_unauthorized_request'));
                }
            }
            $data = $userObj->getPersonalInfo();
            return Utility::sendSuccess($data);
        } catch (\Exception $e) {

            //@todo: Log exception
            return Utility::sendFailed(Lang::get('message.exception_default_error_message'));
        }
    }
    public function postMenteePersonalInfo(Request $request) {
        try {
            $inputs = $request->all();
            $userObj = null;
            if (!empty(array_get($inputs,'mf_token', ''))) {
                $userObj = $this->getUser(array_get($inputs,'mf_token', ''));
                if (false === $userObj) {
                    return Utility::sendFailed(\Config::get('constants_en.txt.txt_unauthorized_request'), \Config::get('constants_en.code.code_unauthorized_request'));
                }
            }
            $max_year = date('Y')-13;
            $min_year = date('Y') - 113;
            $validator = \Validator::make($inputs,[
                'birth_country_id' => 'required',
                'spoken_lang' => ['required','array',Rule::in(UserPersonalInfo::LANG)],
                'phone_mobile' => ['required','regex:/^\d+$/'],
                'm_dial_code' => ['required','regex:/^\d+$/'],
                'birth_year' => 'required|numeric|min:'.$min_year.'|max:'.$max_year,
                'gender' => ['required', Rule::in(['M','F','O','X'])],
                'ethnicity' => ['nullable',Rule::in(UserPersonalInfo::ETHNICITY)],
                'education_level' => ['nullable',Rule::in(UserPersonalInfo::EDUCATION)],
                'intent_to_connect' => ['nullable', Rule::in(['Y','N','NS'])],
            ]);
            if ($validator->passes()) {
                $userObj->addPersonalInfo($inputs);
                unset($inputs, $userObj, $validator);
                return Utility::sendSuccess('', Lang::get('message.success_save_data'));
            }
            return Utility::sendFailed($validator->errors(), \Config::get('constants_en.code.code_failed'));
        } catch (\Exception $e) {

            //@todo: Log exception
            return Utility::sendFailed(Lang::get('message.exception_default_error_message'));
        }
    }

    public function getAccountInfo(Request $request) {
        try {
            $inputs = $request->all();
            $userObj = null;
            if (!empty(array_get($inputs,'mf_token', ''))) {
                $userObj = $this->getUser(array_get($inputs,'mf_token', ''));
                if (false === $userObj) {
                    return Utility::sendFailed(\Config::get('constants_en.txt.txt_unauthorized_request'), \Config::get('constants_en.code.code_unauthorized_request'));
                }
            }
            $data = [];
            if ($userObj->is_mentor === 1) {
                $data = $userObj->getExpertInfo($inputs);
            } else {
                $data = $userObj->getBusinessInfo($inputs);
            }
            return Utility::sendSuccess($data);
        } catch (\Exception $e) {

            //@todo: Log exception
            return Utility::sendFailed($e->getMessage());
            return Utility::sendFailed(Lang::get('message.exception_default_error_message'));
        }
    }

    public function postPrepareAccountToPublish(Request $request) {

        try {
            $inputs = $request->all();
            $userObj = null;
            if (!empty(array_get($inputs,'mf_token', ''))) {
                $userObj = $this->getUser(array_get($inputs,'mf_token', ''));
                if (false === $userObj) {
                    return Utility::sendFailed(\Config::get('constants_en.txt.txt_unauthorized_request'), \Config::get('constants_en.code.code_unauthorized_request'));
                }
            }
            $response = $userObj->publishAccount();
            if (true === $response) {
                return Utility::sendSuccess('', Lang::get('message.success_publish'));
            }
            return Utility::sendFailed($response, \Config::get('constants_en.code.code_failed'));
        } catch (\Exception $e) {

            //@todo: Log exception
            return Utility::sendFailed(Lang::get('message.exception_default_error_message'));
        }
    }

    public function getMentorFormData(Request $request) {
        try {
            $inputs = $request->all();
            $userObj = null;
            if (!empty(array_get($inputs,'mf_token', ''))) {
                $userObj = $this->getUser(array_get($inputs,'mf_token', ''));
                if (false === $userObj) {
                    return Utility::sendFailed(\Config::get('constants_en.txt.txt_unauthorized_request'), \Config::get('constants_en.code.code_unauthorized_request'));
                }
            }
            if ($userObj->is_mentor === 1) {
                $mentor_details = ExpertDetail::getExpertInfo($userObj, $inputs);
                $industries = Industrial::getIndustries();
                $functional_areas = FunctionalAreaGroup::getFunctionalArea();
                $countries = Country::getCountry();
                return Utility::sendSuccess(['mentor_details' => $mentor_details, 'industries' => $industries, 'functional_areas' => $functional_areas, 'countries' => $countries]);
            }
            return Utility::sendFailed(Lang::get('message.unauthorized_profile'));
        } catch (\Exception $e) {

            //@todo: Log exception
            return Utility::sendFailed(Lang::get('message.exception_default_error_message'));
            //return Utility::sendFailed($e->getMessage());
        }
    }

    public function postMentorFormData(Request $request) {
        try {
            $inputs = $request->all();
            $userObj = null;
            if (!empty(array_get($inputs,'mf_token', ''))) {
                $userObj = $this->getUser(array_get($inputs,'mf_token', ''));
                if (false === $userObj) {
                    return Utility::sendFailed(\Config::get('constants_en.txt.txt_unauthorized_request'), \Config::get('constants_en.code.code_unauthorized_request'));
                }
            }
            if ($userObj->is_mentor === 1) {
                $validator = \Validator::make($inputs,[
                    'mentor_selected_expertises' => 'required|array|min:1|max:7',
                    'mentor_industry_id' => 'required',
                    'mentor_professional_bio' => 'required|min:300|max:1000',
                    'mentor_entrepreneur_pitch' => 'required|min:300|max:1000',
                    'mentor_mentoring_stages' => ['required', 'array', Rule::in(UserPersonalInfo::ENTRE_HELPING)],
                    'mentor_years_management' => ['required','regex:/^\d+$/'],
                    'mentor_years_ownership' => ['required','regex:/^\d+$/'],
                    'mentor_country_expertise_id' => 'required|array|min:1',
                    'mentor_language_id' => ['required','array','min:1'],
                    'mentor_country_id' => 'required',
                    'mentor_phone' => ['required','regex:/^\d+$/'],

                    'mentor_website_url' => ['nullable', 'url'],
                    'mentor_business_name' => ['nullable','string'],
                    'mentor_title' => ['nullable','string'],
                    'mentor_city' => ['nullable','regex:/^\d+$/'],
                    'mentor_state' => ['nullable','regex:/^\d+$/'],
                    'mentor_postal_code' => ['nullable','regex:/^\d+$/'],
                    'mentor_ethnicity' => ['required',Rule::in(UserPersonalInfo::ETHNICITY)],
                    'mentor_gender' => ['required', Rule::in(['M','F','O','X'])],
                    'mentor_birth_year' => ['nullable','regex:/^\d+$/'],
                    'mentor_photo_upload' => array_get($inputs, 'data.User.photo_upload','')
                ]);
                if ($validator->passes()) {

                    if (true === $output = $userObj->addExpertData($inputs)) {
                        return Utility::sendSuccess('', Lang::get('message.success_save_data'));
                    }
                    throw new \Exception($output);
                }
                return Utility::sendFailed($validator->errors(), \Config::get('constants_en.code.code_failed'));
            }
            return Utility::sendFailed(Lang::get('message.unauthorized_profile'));
        } catch (\Exception $e) {

            //@todo: Log exception
            return Utility::sendFailed($e->getMessage());
            //return Utility::sendFailed(Lang::get('message.exception_default_error_message'));
        }
    }
}