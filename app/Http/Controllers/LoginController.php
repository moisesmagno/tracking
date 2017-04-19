<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{

    //Shows login screen
    public function index(){
        return view('login.index');
    }
}
