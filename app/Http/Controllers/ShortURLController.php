<?php

namespace App\Http\Controllers;

use App\URL;
use Illuminate\Http\Request;

class ShortURLController extends Controller
{
    private $url_t;

    public function __construct(URL $url)
    {
        $this->url = $url;
    }

    public function show($code){

        $short_url = 'http://localhost/tracking/public/url/' . $code;

        $dataUrl = $this->url->where('short_url', $short_url)->first();

        if($dataUrl){
            header('Location: '.$dataUrl->destiny_url);
            die;
        }else{
            echo "<h1>Desculpe, URL não encontrado! :(</h1>";
            die;
        }
    }
}
