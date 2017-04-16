<?php

/**
 * Created by PhpStorm.
 * User: Moisés
 * Date: 16/04/2017
 * Time: 19:50
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListInfluencersController extends Controller
{
    //Displays the list of influencers
    public function index(){
       return view('influencers.list_influencers');
    }
}
