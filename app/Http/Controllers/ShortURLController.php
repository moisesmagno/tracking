<?php

namespace App\Http\Controllers;

use App\Influencer;
use App\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShortURLController extends Controller
{
    private $influencer;
    private $result;

    public function __construct(Influencer $influencer, Result $result)
    {
        $this->influencer = $influencer;
        $this->result = $result;
    }

    //Shows URL destination
    public function show($code){

        //Mounts the short URL
        $short_url = PATH_SHORT_URL . $code;

        $dataUrl = $this->influencer->where('short_url', $short_url)->first();

        if($dataUrl){

            //Save informations the link
            if($this->store($dataUrl)){

                return view('redirects.link')->with(['dataUrl' => $dataUrl]);
            }

        }else{
            echo "<h1>Desculpe, URL não encontrado! :(</h1>";
            die;
        }
    }

    public function store($dataUrl){

        //REFERER
        if(isset($_SERVER['HTTP_REFERER'])) {
            $referer = $_SERVER['HTTP_REFERER'];

            if(strpos($referer, 'pinterest')){
                $referer = 'Pinterest';
            }elseif(strpos($referer,'facebook')){
                $referer = 'Facebook';
            }elseif(strpos($referer, 'linkedin')){
                $referer = 'Linkedin';
            }elseif(strpos($referer, 'outlook')){
                $referer = 'Outlook';
            }elseif(strpos($referer, 't.co')){
                $referer = 'Twitter';
            }elseif(strpos($referer, 'instagram')){
                $referer = 'Instagram';
            }elseif(strpos($referer, 'plus.google')){
                $referer = 'Google plus';
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

            DB::beginTransaction();

            $data = $this->result->create([
                'id_influencer' => $dataUrl->id,
                'referer' => $referer,
                'agent' => $browser,
                'remote_addr' => $remote_addr,
            ]);

            setcookie('id_influencer', $dataUrl->id, time()+2592000, '/', DOMAIN, false, false);
            setcookie('referer', $referer, time()+2592000, '/', DOMAIN, false, false);

            if(!empty($data)){
                DB::commit();
                return true;
            }else{
                return false;
            }

        } catch (PDOException $e) {
            DB::rollback();
            echo '<h1>Desculpe, ocorreu um erro, por favor entre em contato com o suporte.</h1>';
            die;
        }

    }
}
