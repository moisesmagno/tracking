<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultInfluencersController extends Controller
{
    //Calls the screen of the result of the influenced
    public function index(){
        return view('influencers.result_influencers');
    }
}
