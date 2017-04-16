<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //Call sign in
    public function index(){
        return view('login.index');
    }

}
