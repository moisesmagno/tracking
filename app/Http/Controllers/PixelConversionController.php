<?php

/**
 * Created by PhpStorm.
 * User: Moisés
 * Date: 16/04/2017
 * Time: 19:50
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PixelConversionController extends Controller
{
    //Displays the conversion pixel screen
    public function index(){
        return view('pixel_conversion.index');
    }
}


