<?php

namespace App\Http\Controllers;

use App\Influencer;
use Illuminate\Http\Request;

class InfluencerController extends Controller
{

    private $influencer;

    public function __construct(Influencer $influencer){
        $this->influencer = $influencer;
    }

    //Display the influencer screen
    public function index(){
    //
    }

}
