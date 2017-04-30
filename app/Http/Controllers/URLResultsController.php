<?php

namespace App\Http\Controllers;

use App\URL;
use App\URLResult;
use Illuminate\Http\Request;

class URLResultsController extends Controller
{

    private $url;
    private $urlResult;

    public function __construct(URL $url, URLResult $url_result)
    {
        $this->url = $url;
        $this->urlResult = $url_result;
    }

    //Displays the screen results screen
    public function index($id){

        $url = $this->url->find($id);
        $url_results = $this->urlResult->where('id_url', $id)
                                        ->selectRaw("count(id) as total_clicks, referer, (
                                                select count('remote_addr')from url_results as url_result
                                                where url_result.referer = url_results.referer
                                                group by referer, remote_addr
                                                having count('remote_addr') > 1
                                            ) as unique_clicks")
                                        ->groupBy('referer')
                                        ->get();

        return view('urls.url_results')->with(['url' => $url, 'url_results' => $url_results]);
    }
}
