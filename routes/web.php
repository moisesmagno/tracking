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
Route::name('register_new_user')->post('/register-user', 'RegisterController@store');

//Recover password
Route::name('recover-password')->get('/recover-password', 'RecoverPasswordController@index');
Route::name('update_password')->put('/update-password', 'RecoverPasswordController@update');


/* -------------------------------------------------------------------------
ROUTE GROUP - ADMINRoute Group - Admin
------------------------------------------------------------------------- */
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function(){

    //Home - Campaigns
    Route::name('home')->get('/home', 'HomeController@index');

    //List influencers
    Route::name('list_influencers')->get('/lista-influenciadores', 'ListInfluencersController@index');

    //Result influencers
    Route::name('result_influencers')->get('/resultado-influenciadores', 'ResultInfluencersController@index');

    //Pixel conversion
    Route::name('pixel_conversion')->get('/pixel-conversao', 'PixelConversionController@index');

    //Plans
    Route::name('plans')->get('/planos', 'PlanosController@index');
});
