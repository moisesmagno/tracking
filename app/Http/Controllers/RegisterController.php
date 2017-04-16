<?php

/**
 * Created by PhpStorm.
 * User: Moisés
 * Date: 16/04/2017
 * Time: 19:50
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //Displays the registration screen
    public function index(){
        return view('register.index');
    }
}
