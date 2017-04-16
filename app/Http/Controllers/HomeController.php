<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Calls a campaigns screen
    public function index(){
        return view('campaigns.home');
    }
}
