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

//Home
Route::name('home')->get('/home', 'HomeController@index');