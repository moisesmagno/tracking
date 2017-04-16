<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultInfluencersController extends Controller
{
    //
    public function index(){
        return view('campaigns.result_of_influencers');
    }
}
