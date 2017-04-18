<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //Displays the registration screen
    public function index(){
        return view('register.index');
    }
}
