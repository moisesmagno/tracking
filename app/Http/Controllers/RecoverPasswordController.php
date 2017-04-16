<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecoverPasswordController extends Controller
{
    //Calls the screen that recover the password
    public function index(){
        return view('recover_password.index');
    }
}

