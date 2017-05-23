<?php

namespace App\Http\Controllers;

use App\Result;
use App\Influencer;
use App\PixelConversion;
use Illuminate\Http\Request;

class ResultsController extends Controller
{

    private $result;
    private $pixel;
    private $influencer;

    public function __construct(Result $result, PixelConversion $pixel, Influencer $influencer)
    {
        $this->result = $result;
        $this->pixel = $pixel;
        $this->influencer = $influencer;
    }

    //Display results result screen
    public function index($id){

        $influencer = $this->influencer
            ->where('id', $id)
            ->first();

        //URL click counter
        $url_results = $this->result
            ->selectRaw("referer,
                         count(id) as total_clicks, 
                         count(distinct remote_addr) as unique_clicks")
            ->where('id_influencer', $id)
            ->groupBy('referer')
            ->get();

        //Pixel data and conversions
        $pixel = $this->pixel
        ->with('usersAccessInformations')
        ->where('id_user', session('id'))
        ->first();

        return view('results.results_access_conversions')->with(['influencer' => $influencer, 'url_results' => $url_results, 'pixel' => $pixel]);
    }
}
