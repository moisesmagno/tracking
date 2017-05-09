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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    // return $request->user();
    return User::all();
});


Route::name('register_user')->post('/register-user', 'LoginController@store');

//User access information
Route::name('user_access_information')->post('/user/access-information', 'UserAccessInformationController@store');

//Register user
route::name('new_user')->post('/new/user', 'UserAPIController@store');