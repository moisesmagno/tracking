<?php

/**
 * Created by PhpStorm.
 * User: Moisés
 * Date: 16/04/2017
 * Time: 19:50
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //Shows login screen
    public function index(){
        return view('login.index');
    }

}
