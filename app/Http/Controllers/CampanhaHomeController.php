<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CampanhaHomeController extends Controller
{
    //Calls a campanhas screen
    public function index(){
        return view('campanhas.home');
    }
}
