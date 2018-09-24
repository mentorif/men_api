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

Route::prefix('V1')->middleware(['incoming.validate'])->group(function(){
    Route::post('/user/register', ['uses' => 'V1\UserController@postRegister'])->middleware('public.token');
    Route::post('/user/signin', ['uses' => 'V1\UserController@postSignIn'])->middleware('public.token');
});