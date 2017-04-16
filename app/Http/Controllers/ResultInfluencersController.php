<?php

/**
 * Created by PhpStorm.
 * User: Moisés
 * Date: 16/04/2017
 * Time: 19:50
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultInfluencersController extends Controller
{
    //Displays the screen results screen
    public function index(){
        return view('influencers.result_influencers');
    }
}
