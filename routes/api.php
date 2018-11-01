<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware(['incoming.validate'])->group(function(){

    Route::post('/reset/redis-key', ['uses' => 'V1\ResetController@postResetRedisKey'])->middleware('public.token');
    Route::get('/checkme',['uses' => 'BaseController@getCheckMe'])->middleware('public.token');

});
Route::prefix('V1')->middleware(['incoming.validate'])->group(function(){
    Route::post('/user/register', ['uses' => 'V1\UserController@postRegister'])->middleware('public.token');
    Route::post('/user/signin', ['uses' => 'V1\UserController@postSignIn'])->middleware('public.token');

    Route::post('/account/coc',['uses' => 'V1\AccountController@postCodeConduct'])->middleware('private.token');
    Route::post('/account/terms',['uses' => 'V1\AccountController@postTermsCond'])->middleware('private.token');

    Route::get('/account/venture-data',['uses' => 'V1\AccountController@getVentureFormData'])->middleware('private.token');
    Route::post('/account/venture-data',['uses' => 'V1\AccountController@postVentureFormData'])->middleware('private.token');
    Route::post('/account/profile-pic',['uses' => 'V1\AccountController@postProfilePic'])->middleware('private.token');
    Route::post('/account/mentee-personal-info',['uses' => 'V1\AccountController@postMenteePersonalInfo'])->middleware('private.token');
    Route::get('/account/mentee-personal-info',['uses' => 'V1\AccountController@getMenteePersonalInfo'])->middleware('private.token');
    Route::get('/account/info',['uses' => 'V1\AccountController@getAccountInfo'])->middleware('private.token');

    Route::get('/country-region',['uses' => 'V1\CommonController@getCountryRegion']);
    Route::get('/list-country',['uses' => 'V1\CommonController@getCountries']);

    Route::post('/account/ready_to_go',['uses' => 'V1\AccountController@postPrepareAccountToPublish'])->middleware('private.token');
});