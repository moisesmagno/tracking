<?php

namespace App\Http\Controllers;

use App\URL;
use App\URLResult;
use Illuminate\Http\Request;

class ShortURLController extends Controller
{
    private $url;
    private $url_result;

    public function __construct(URL $url, URLResult $url_result)
    {
        $this->url = $url;
        $this->url_result = $url_result;
    }

    //Shows URL destination
    public function show($code){

        //Mounts the short URL
        $short_url = PATH_SHORT_URL . $code;

        $dataUrl = $this->url->where('short_url', $short_url)->first();

        if($dataUrl){

            //Save informations the link
            if($this->store($dataUrl->id)){
                header('Location: '.$dataUrl->destiny_url);
                die;
            }

        }else{
            echo "<h1>Desculpe, URL não encontrado! :(</h1>";
            die;
        }
    }

    public function store($id_url){

        //REFERER
        if(isset($_SERVER['HTTP_REFERER'])){
            $referer = $_SERVER['HTTP_REFERER'];

            if(strpos($referer,'facebook')){
                $referer = 'Facebook';
            }elseif(strpos($referer, 'linkedin')){
                $referer = 'Linkedin';
            }elseif(strpos($referer, 'outlook')){
                $referer = 'Outlook';
            }else{
                $referer = 'Outro';
            }

        }else{
            $referer = 'Outro';
        }

        //RECOVER BROWSER
        $useragent = $_SERVER['HTTP_USER_AGENT'];

        if (preg_match('|MSIE ([0-9].[0-9]{1,2})|',$useragent)) {
            $browser = 'IE';
        } elseif (preg_match( '|Opera/([0-9].[0-9]{1,2})|',$useragent)) {
            $browser = 'Opera';
        } elseif(preg_match('|Firefox/([0-9\.]+)|',$useragent)) {
            $browser = 'Firefox';
        } elseif(preg_match('|Chrome/([0-9\.]+)|',$useragent)) {
            $browser = 'Chrome';
        } elseif(preg_match('|Safari/([0-9\.]+)|',$useragent)) {
            $browser = 'Safari';
        } else {
            // browser not recognized!
            $browser = 'Outro';
        }

        //REMOTE_ADDR
        $remote_addr = $_SERVER['REMOTE_ADDR'];

        try{

            $data = $this->url_result->create([
                'id_url' => $id_url,
                'referer' => $referer,
                'agent' => $browser,
                'remote_addr' => $remote_addr,
            ]);

            if(!empty($data)){
                return true;
            }else{
                return false;
            }

        } catch (PDOException $e) {
            echo '<h1>Desculpe, ocorreu um erro, por favor entre em contato com o suporte.</h1>';
            die;
        }

    }
}
