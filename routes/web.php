<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Login
Route::name('login')->get('/', 'LoginController@index');

//Register
Route::name('register')->get('/register', 'RegisterController@index');

//Recover password
Route::name('recover-password')->get('/recover-password', 'RecoverPasswordController@index');

//Home - Campaigns
Route::name('home')->get('/home', 'HomeController@index');

//List influencers
Route::name('list_influencers')->get('/lista-influenciadores', 'ListInfluencersController@index');

//Result influencers
Route::name('result_influencers')->get('/resultado-influenciadores', 'ResultInfluencersController@index');

//Pixel conversion
Route::name('pixel_conversion')->get('/pixel-conversao', 'PixelConversionController@index');
