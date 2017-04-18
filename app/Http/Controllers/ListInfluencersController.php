<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListInfluencersController extends Controller
{
    //Displays the list of influencers
    public function index(){
       return view('influencers.list_influencers');
    }
}
