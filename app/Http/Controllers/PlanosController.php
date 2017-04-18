<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanosController extends Controller
{
    //Displays the plan screen
    public function index(){
        return view('planos.index');
    }
}

