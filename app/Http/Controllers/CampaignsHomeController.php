<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CampaignsHomeController extends Controller
{
    //Calls a campaigns screen
    public function index(){
        return view('campaigns.home');
    }
}
