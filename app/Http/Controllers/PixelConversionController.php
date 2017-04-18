<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PixelConversionController extends Controller
{
    //Displays the conversion pixel screen
    public function index(){
        return view('pixel_conversion.index');
    }
}


