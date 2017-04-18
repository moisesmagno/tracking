<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultInfluencersController extends Controller
{
    //Displays the screen results screen
    public function index(){
        return view('influencers.result_influencers');
    }
}
