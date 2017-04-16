<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListInfluencersController extends Controller
{
    //Calls up the list of influencers list
    public function index(){
       return view('campanhas.list_influencers');
    }
}
