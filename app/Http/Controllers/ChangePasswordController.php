<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    //Calls the screen that changes the password
    public function index(){
        return view('change_password.index');
    }
}
