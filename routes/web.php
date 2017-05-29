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
Route::name('recover-password')->get('/recuperar-senha', 'RecoverPasswordController@index');
Route::name('update_password')->put('/update-password', 'RecoverPasswordController@update');

//URL Short
Route::name('short_url')->get('/u/{code}', 'ShortURLController@show');

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
    Route::name('update_pixel_conversion')->put('/pixel-conversao/update', 'PixelConversionController@update');
    Route::name('recover_data_pixel_conversion')->post('/pixel-conversao/recover-data', 'PixelConversionController@recoverData');

    //Plans
    Route::name('plans')->get('/planos', 'PlanosController@index');

    /* ----- Group Capaigns ----- */
    Route::group(['prefix' => 'marca'], function(){

        //Marks
        Route::name('home')->get('/home', 'MarkController@index');
        Route::name('register_mark')->post('/register', 'MarkController@store');
        Route::name('edit_mark')->post('/edit', 'MarkController@edit');
        Route::name('update_mark')->put('/update', 'MarkController@update');
        Route::name('delete_mark')->delete('/delete', 'MarkController@destroy');

        //Campaigns
        Route::name('list_campaigns')->get('/{id}/campanhas', 'CampaignController@index');
        Route::name('register_campaign')->post('/campaign/register', 'CampaignController@store');
        Route::name('edit_campaign')->post('/campaign/edit', 'CampaignController@edit');
        Route::name('update_campaign')->put('/campaign/update', 'CampaignController@update');
        Route::name('delete_campaign')->delete('/campaign/delete', 'CampaignController@destroy');

        //Ifluencers
        Route::name('list_influencers')->get('/campanha/{id}/influenciadores', 'InfluencerController@index');
        Route::name('register_influencer')->post('/campaign/influencer/register', 'InfluencerController@store');
        Route::name('edit_influencer')->post('/campaign/influencer/edit', 'InfluencerController@edit');
        Route::name('update_influencer')->put('/campaign/influencer/update', 'InfluencerController@update');
        Route::name('delete_influencer')->delete('/campaign/influencer/delete', 'InfluencerController@destroy');


        //Results
        Route::name('results')->get('/campaign/influencer/{id}/relatorio', 'ResultsController@index');

    });

});
