<?php

/**
 * Created by PhpStorm.
 * User: Moisés
 * Date: 16/04/2017
 * Time: 20:54
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanosController extends Controller
{
    //Displays the plan screen
    public function index(){
        return view('planos.index');
    }
}

