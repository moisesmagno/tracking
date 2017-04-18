<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Displays campaign home screen
    public function index(){
        return view('campaigns.home');
    }
}
