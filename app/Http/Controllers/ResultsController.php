<?php

namespace App\Http\Controllers;

use App\Result;
use App\Campaign;
use App\Influencer;
use App\PixelConversion;
use App\UserAccessInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultsController extends Controller
{

    private $result;
    private $pixel;
    private $influencer;
    private $userAccess;

    public function __construct(Campaign $campaign, Result $result, PixelConversion $pixel, Influencer $influencer, UserAccessInformation $userAccess)
    {
        $this->result = $result;
        $this->pixel = $pixel;
        $this->campaign = $campaign;
        $this->influencer = $influencer;
        $this->pixel = $pixel;
        $this->userAccess = $userAccess;
    }

    //Display results result screen
    public function index($id){

        //Session to be used in the page navigator
        session(['id_influencer' => $id]);

        //Influencer
        $influencer = $this->influencer
            ->where('id', $id)
            ->first();

        //ID Pixel
        $idPixel = $this->campaign->find($influencer->id_campaign)->id_pixel;

        //Pixel data and conversions
        $pixel = $this->pixel
            ->join('user_access_information as ua', 'pixel.id', '=','ua.id_pixel')
            ->selectRaw("
                pixel.id, 
                pixel.name, 
                count(ua.id_influencer) as conversions, 
                pixel.value, 
                pixel.time_interval, 
                pixel.interval_type, 
                DATE_FORMAT(pixel.created_at, '%d-%m-%Y') as date
            ")
            ->where('pixel.id_user', session('id'))
            ->where('pixel.id', $idPixel)
            ->where('ua.id_influencer', $influencer->id)
            ->groupBy('pixel.id', 'pixel.name', 'pixel.value', 'pixel.time_interval', 'pixel.interval_type', 'pixel.created_at')
            ->first();

        if(!empty($pixel)){
            $pixel->totalConversion = number_format(($pixel->conversoes * $pixel->value), 2, ',', '.');
        }

        //URL click counter
        $url_results = $this->result
            ->selectRaw("referer,
                         count(id) as total_clicks, 
                         count(distinct remote_addr) as unique_clicks")
            ->where('id_influencer', $id)
            ->groupBy('referer')
            ->orderBy('referer')
            ->get();

        $referers = [];
        if(!$url_results->isEmpty()) {

            foreach ($url_results as $resultURL) {
                array_push($referers, $resultURL->referer);
            }

            //Get conversions
            $conversions = $this->userAccess
                ->selectRaw("referer_short_url, count(id) as total_conversions")
                ->whereIn('referer_short_url', $referers)
                ->where('id_pixel', $idPixel)
                ->where('id_influencer', $id)
                ->groupBy('referer_short_url')
                ->orderBy('referer_short_url')
                ->get();

            foreach ($url_results as $resultURL) {
                foreach ($conversions as $conversion) {
                    if ($resultURL->referer === $conversion->referer_short_url) {
                        $resultURL->conversao = $conversion->total_conversions;
                        $resultURL->valor_total = number_format($conversion->total_conversions * $pixel->value, 2, ',', '.');
                    }
                }
            }
        }

        return view('results.results_access_conversions')->with(['influencer' => $influencer, 'url_results' => $url_results, 'pixel' => $pixel]);
    }
}
