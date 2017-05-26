<?php

namespace App\Http\Controllers;

use App\Influencer;
use App\Result;
use App\Campaign;
use App\UserAccessInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShortURLController extends Controller
{
    private $influencer;
    private $result;
    private $userAccessInformation;

    public function __construct(Influencer $influencer, Result $result, UserAccessInformation $userAccessInformation, Campaign $campaign)
    {
        $this->influencer = $influencer;
        $this->result = $result;
        $this->userAccessInformation = $userAccessInformation;
        $this->campaign = $campaign;
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
        $remote_addr = $_SERVER["REMOTE_ADDR"];

        try{

            DB::beginTransaction();

            $data = $this->result->create([
                'id_influencer' => $dataUrl->id,
                'referer' => $referer,
                'agent' => $browser,
                'remote_addr' => $remote_addr,
            ]);

            $id_pixel = $this->campaign->find($dataUrl->id_campaign)->id_pixel;

            $dataUser = $this->userAccessInformation
                        ->where('id_pixel', $id_pixel)
                        ->where('remote_addr', $remote_addr)
                        ->where('id_influencer', $dataUrl->id)
                        ->where('referer_short_url', $referer)
                        ->first();

            if(!$dataUser){
                $this->userAccessInformation->create([
                    'id_pixel' => $id_pixel,
                    'remote_addr' => $remote_addr,
                    'id_influencer' => $dataUrl->id,
                    'referer_short_url' => $referer
                ]);
            }

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
