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
Route::name('login_user')->post('/login', 'LoginController@validateLogin');
Route::name('logout_user')->get('/logout', 'LoginController@logout');

//Register
Route::name('register')->get('/registro', 'RegisterController@index');
Route::name('register_new_user')->post('/register-user', 'RegisterController@store');

//Recover password
Route::name('recover-password')->get('/recover-password', 'RecoverPasswordController@index');
Route::name('update_password')->put('/update-password', 'RecoverPasswordController@update');


/* -------------------------------------------------------------------------
ROUTE GROUP - ADMINRoute Group - Admin
------------------------------------------------------------------------- */
Route::group(['middleware' => 'auth'], function(){

    //Profile of user
    Route::name('profile_user')->get('/perfil', 'ProfileUserController@index');
    Route::name('change_password')->put('/user/change-password', 'ProfileUserController@changePassword');

    //Pixel conversion
    Route::name('pixel_conversion')->get('/pixel-conversao', 'PixelConversionController@index');

    //Plans
    Route::name('plans')->get('/planos', 'PlanosController@index');

    /* ----- Group Capaigns ----- */
    Route::group(['prefix' => 'campanha'], function(){

        //Home - Campaigns
        Route::name('home')->get('/home', 'CampaignController@index');

        //URLs
        Route::name('urlS')->get('/urls', 'URLController@index');

        //URL Results
        Route::name('url_results')->get('/resultado-url', 'URLResultsController@index');

    });

});
