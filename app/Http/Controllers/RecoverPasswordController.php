<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecoverPasswordController extends Controller
{
    //Displays the password recovery screen
    public function index(){
        return view('recover_password.index');
    }
}

