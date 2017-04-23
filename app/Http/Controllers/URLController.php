<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class URLController extends Controller
{
    //Displays the list of urls
    public function index(){
       return view('urls.urls');
    }
}
