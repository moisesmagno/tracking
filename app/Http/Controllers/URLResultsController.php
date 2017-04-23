<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class URLResultsController extends Controller
{
    //Displays the screen results screen
    public function index(){
        return view('urls.url_results');
    }
}
