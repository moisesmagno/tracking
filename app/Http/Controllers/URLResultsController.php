<?php

namespace App\Http\Controllers;

use App\URL;
use App\URLResult;
use App\PixelConversion;
use Illuminate\Http\Request;

class URLResultsController extends Controller
{

    private $url;
    private $urlResult;
    private $pixelConversion;

    public function __construct(URL $url, URLResult $url_result, PixelConversion $pixelConversion)
    {
        $this->url = $url;
        $this->urlResult = $url_result;
        $this->pixelConversion = $pixelConversion;
    }

    //Display urls result screen
    public function index($id){

        $url = $this->url->where('id_user', session('id'))->where('id', $id)->first();

        $url_results = $this->urlResult
        ->where('id_url', $id)
        ->where('id_user', session('id'))
        ->selectRaw("count(id) as total_clicks, referer, (
                select count('remote_addr')from url_results as url_result
                where url_result.referer = url_results.referer
                group by referer, remote_addr
                having count('remote_addr') > 1
            ) as unique_clicks")
        ->groupBy('referer')
        ->get();

        $pixel = $this->pixelConversion
        ->with('usersAccessInformations')
        ->where('id_user', session('id'))
        ->where('id_url', $id)
        ->first();

        return view('urls.url_results')->with(['url' => $url, 'url_results' => $url_results, 'pixel' => $pixel]);
    }
}
