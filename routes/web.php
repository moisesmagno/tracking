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

//URL
Route::name('short_url')->get('/url/{code}', 'ShortURLController@show');

/* -------------------------------------------------------------------------
ROUTE GROUP - ADMINRoute Group - Admin
------------------------------------------------------------------------- */
Route::group(['middleware' => 'auth'], function(){

    //Profile of user
    Route::name('profile_user')->get('/perfil', 'ProfileUserController@index');
    Route::name('change_password')->put('/user/change-password', 'ProfileUserController@changePassword');

    //Pixel conversion
    Route::name('pixel_conversion')->get('/pixel-conversao', 'PixelConversionController@index');
    Route::name('register_pixel_conversion')->post('/pixel-conversao/register', 'PixelConversionController@store');
    Route::name('edit_pixel_conversion')->post('/pixel-conversao/edit', 'PixelConversionController@edit');
    Route::name('delete_pixel_conversion')->delete('/pixel-conversao/delete', 'PixelConversionController@destroy');

    //Plans
    Route::name('plans')->get('/planos', 'PlanosController@index');

    /* ----- Group Capaigns ----- */
    Route::group(['prefix' => 'campanha'], function(){

        //Home - Campaigns
        Route::name('home')->get('/home', 'CampaignController@index');
        Route::name('register_campaign')->post('/register', 'CampaignController@store');
        Route::name('delete_campaign')->delete('/delete', 'CampaignController@destroy');
        Route::name('edit_campaign')->post('/edit', 'CampaignController@edit');
        Route::name('update_campaign')->put('/update', 'CampaignController@update');

        //URLs
        Route::name('urls')->get('/url/{id}', 'URLController@index');
        Route::name('register_url')->post('/url/register', 'URLController@store');
        Route::name('edit_url')->post('/url/edit', 'URLController@edit');
        Route::name('update_url')->put('/url/update', 'URLController@update');
        Route::name('delete_url')->delete('/url/delete', 'URLController@destroy');

        //URL Results
        Route::name('url_results')->get('/url/{id}/relatorio', 'URLResultsController@index');

    });

});
