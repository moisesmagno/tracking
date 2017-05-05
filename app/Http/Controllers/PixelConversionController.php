<?php

namespace App\Http\Controllers;

use App\PixelConversion;
use Illuminate\Http\Request;

class PixelConversionController extends Controller
{
    
    private $pixelConversion;

    public function __construct(PixelConversion $pixelConversion){
    	$this->pixelConversion = $pixelConversion;
    }

    //Displays the conversion pixel screen
    public function index(){
        return view('pixel_conversion.index');
    }
}


