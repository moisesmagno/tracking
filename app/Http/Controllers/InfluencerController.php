<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\URL;
use App\URLResult;
use App\PixelConversion;
use App\UserAccessInformation;
use App\Influencer;
use Illuminate\Http\Request;

class InfluencerController extends Controller
{

    private $campaign;
    private $influencer;
    private $url;
    private $urlresult;
    private $pixel;
    private $userAccessInformation;

    public function __construct(Campaign $campaign, Influencer $influencer, URL $url, URLResult $urlresult, PixelConversion $pixel, UserAccessInformation $userAccessInformation){
        $this->campaign = $campaign;
        $this->influencer = $influencer;
        $this->url = $url;
        $this->urlresult = $urlresult;
        $this->pixel = $pixel;
        $this->userAccessInformation = $userAccessInformation;
    }

    //Display the influencers screen
    public function index($id){

        $campaign = $this->campaign->find($id);

        $influencers = $this->influencer->where('id_user', session('id'))->where('id_campaign', $id)->get();

        return view('influencers.index')->with(['campaign' => $campaign, 'influencers' => $influencers]);
    }

    //Register influencer
    public function store(Request $request){
        try{
            $influencer = $this->influencer
            ->where('id_user', session('id'))
            ->where('id_campaign', $request->get('id_campaign'))
            ->where('name', $request->get('name'))
            ->first();

            if(!$influencer){

                $this->influencer->create([
                    'id_user' => session('id'),
                    'id_campaign' => $request->get('id_campaign'),
                    'name' => $request->get('name')
                ]);

                session()->flash('alert-success', '<b>Sucesso!</b> O Incluenciador foi adicionado.');
                return redirect()->back();

            }else{
                session()->flash('alert-warning', '<b>Atenção!</b> Já existe um influenciador cadastrado com o mesmo nome.');
                return redirect()->back();
            }

        } catch (PDOException $e) {
            session()->flash('alert-danger', '<b>Erro!</b> Ocorreu uma falha crítica ao tentar cadastrar o influenciador, por favor tente novamente ou entre em contato.');
            return redirect()->back();
        }

    }

    //Edit Influencer
    public function edit(Request $request)
    {
        if($request->ajax()){
            $influencer = $this->influencer->find($request->get('id'));
            return json_encode($influencer);
        }
    }

    //Update Influencer
    public function update(Request $request){

        if($request->ajax()){

            try{

                $influencer = $this->influencer
                    ->where('id_user', session('id'))
                    ->where('id_campaign', $request->get('id_campaign'))
                    ->where('name', $request->get('name'))
                    ->first();

                if(!empty($influencer) && $influencer->id != $request->get('id')){
                    return 'name-existing';
                }else{
                    $this->influencer->where('id', $request->get('id'))->update(['name' => $request->get('name')]);
                    return 'update-true';
                }

            } catch (PDOException $e) {
                return 'error-exception';
            }
        }
    }

    //Delete Influencer
    public function destroy(Request $request)
    {
        if($request->ajax()){

            try{

                $urls = $this->url
                ->where('id_user', session('id'))
                ->where('id_influencer', $request->get('id'))
                ->pluck('id')
                ->toArray();

                if($urls){

                    $this->urlresult->where('id_user', session('id'))->whereIn('id_url', $urls)->delete();

                    $pixels = $this->pixel
                    ->where('id_user', session('id'))
                    ->whereIn('id_url', $urls)
                    ->pluck('id')->toArray();

                    if($pixels){
                        $this->userAccessInformation->where('id_user', session('id'))->whereIn('id_pixel_conversion', $pixels)->delete();
                        $this->pixel->where('id_user', session('id'))->whereIn('id', $pixels)->delete();
                    }

                    $this->url->where('id_user', session('id'))->whereIn('id', $urls)->delete();

                }

                $deleteInfluencer = $this->influencer
                ->where('id_user', session('id'))
                ->where('id', $request->get('id'))
                ->delete();

                if($deleteInfluencer){
                    return 'delete-true';
                }

            } catch (PDOException $e) {
                return 'error-exception';
            }
        }
    }
}
