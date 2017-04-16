<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //Call the registration screem
    public function index(){
        return view('register.index');
    }
}
