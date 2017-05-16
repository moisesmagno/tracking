<?php

namespace App\Http\Controllers;

use App\URL;
use App\Campaign;
use App\Influencer;
use App\URLResult;
use App\PixelConversion;
use App\UserAccessInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\URLResgisterRequest;

class URLController extends Controller
{

    private $campaign;
    private $url;
    private $urlResult;
    private $influencer;
    private $pixel;
    private $userAccessInformation;

    public function __construct(Campaign $campaign, URL $url,  URLResult $urlResult, Influencer $influencer, PixelConversion $pixel, UserAccessInformation $userAccessInformation)
    {
        $this->campaign = $campaign;
        $this->url = $url;
        $this->urlResult = $urlResult;
        $this->influencer = $influencer;
        $this->pixel = $pixel;
        $this->userAccessInformation = $userAccessInformation;
    }

    //Displays the list of urls
    public function index($id){

        //Session to be used in the page navigator
        session(['id_influencer' => $id]);

        $influencer = $this->influencer->find($id);

        $urls = $this->url->where('id_user', session('id'))->where('id_influencer', $id)->orderBy('id', 'desc')->get();

        return view('urls.urls')->with(['influencer' => $influencer, 'urls' => $urls]);
    }

    //Register URL
    public function store(URLResgisterRequest $request){

        try{

            $validate = true;
            while($validate == true){
                //Generates the URL code
                $code_url = chr(rand(65,90)) . rand(1, 99) . chr(rand(65,90)) . rand(1, 9) . chr(rand(65,90)) . rand(1, 9) . chr(rand(65,90));
                $code = $this->url->where('short_url', $code_url)->first();

                if($code){
                    $validate = true;
                }else{
                    $short_url = PATH_SHORT_URL.$code_url;
                    $validate = false;
                }
            }

            $url = $this->url->create([
                'id_user' => session('id'),
                'id_influencer' => $request->get('id_influencer'),
                'description' => $request->get('description'),
                'destiny_url' => $request->get('destiny_url'),
                'short_url' => $short_url,
            ]);

            if($url){
                session()->flash('alert-success', '<b>Sucesso!</b> Nova URL cadastrada.');
                return redirect()->back();

            }else{
                session()->flash('alert-danger', '<b>Erro!</b> Ocorreu uma falha ao tentar cadastrar a url, por favor tente novamente ou entre em contato.');
                return redirect()->back();
            }

        }catch (PDOException $e) {
            session()->flash('alert-danger', '<b>Erro!</b> Ocorreu uma falha crítica ao tentar cadastrar a url, por favor tente novamente ou entre em contato.');
            return redirect()->back();
        }
    }

    //Edit URL
    public function edit(Request $request)
    {
        if($request->ajax()){
            $url = $this->url->find($request->get('id'));
            return json_encode($url);
        }
    }

    //Update URL
    public function update(Request $request)
    {
        if($request->ajax()){

            try{

                $url = $this->url
                ->where('id_user', session('id'))
                ->where('id_influencer', $request->get('id_influencer'))
                ->where('description', $request->get('description'))
                ->first();

                if(!empty($url) && $url->id != $request->get('id')){

                    return 'name-existing';

                }else{

                    $this->url
                    ->where('id', $request->get('id'))
                    ->where('id_user', session('id'))
                    ->where('id_influencer', $request->get('id_influencer'))
                    ->update([
                        'description' => $request->get('description'),
                    ]);
                    return 'update-true';
                }

            } catch (PDOException $e) {
                return 'error-exception';
            }
        }
    }

    //Delete URL
    public function destroy(Request $request)
    {
        if($request->ajax()){

            try{

                $this->urlResult
                ->where('id_user', session('id'))
                ->where('id_url', $request->get('id'))
                ->delete();

                $pixel = $this->pixel
                ->where('id_user', session('id'))
                ->where('id_url', $request->get('id'))
                ->first();

                if($pixel){

                    $this->userAccessInformation
                    ->where('id_user', session('id'))
                    ->where('id_pixel_conversion', $pixel->id)
                    ->delete();

                    $this->pixel->where('id_user', session('id'))->where('id_url', $request->get('id'))->delete();

                }

                $deleteURL = $this->url->where('id_user', session('id'))->where('id', $request->get('id'))->delete();
                

                if($deleteURL){
                    return 'delete-true';
                }

            } catch (PDOException $e) {
                return 'error-exception';
            }
        }
    }
}
