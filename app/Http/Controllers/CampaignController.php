<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Influencer;
use App\URL;
use App\URLResult;
use App\PixelConversion;
use App\UserAccessInformation;
use Illuminate\Http\Request;
use App\Http\Requests\CampaignRegisterRequest;

class CampaignController extends Controller
{

    private $campaign;
    private $url;
    private $urlResult;
    private $influencer;
    private $pixel;
    private $userAccessInformation;

    public function __construct(Campaign $campaign, Influencer $influencer, URL $url, URLResult $urlResult, PixelConversion $pixel, UserAccessInformation $userAccessInformation)
    {
        $this->campaign = $campaign;
        $this->url = $url;
        $this->urlResult = $urlResult;
        $this->influencer = $influencer;
        $this->pixel = $pixel;
        $this->userAccessInformation = $userAccessInformation;
    }

    //Displays campaign home screen
    public function index()
    {
        $campaigns = $this->campaign->where('id_user', session('id'))
                                    ->orderBy('id', 'desc')
                                    ->get();

        return view('campaigns.home')->with(['campaigns' => $campaigns]);
    }

    //Register Campaign
    public function store(CampaignRegisterRequest $request)
    {

        try{

            $campaign = $this->campaign->where('id_user', session('id'))->where('name', $request->get('name'))->first();

            if(!$campaign){

                $this->campaign->create([
                    'id_user' => session('id'),
                    'name' => $request->get('name')
                ]);

                session()->flash('alert-success', '<b>Sucesso!</b> A campanha foi adicionada.');
                return redirect()->back();

            }else{
                session()->flash('alert-warning', '<b>Atenção!</b> Não foi possível alterar o nome da campanha, pois já existe outra campanha com o mesmo nome.');
                return redirect()->back();
            }

        } catch (PDOException $e) {
            session()->flash('alert-danger', '<b>Erro!</b> Ocorreu uma falha crítica ao tentar cadastrar a campanha, por favor tente novamente ou entre em contato.');
            return redirect()->back();
        }
    }

    //Delete Campaign
    public function destroy(Request $request)
    {
        if($request->ajax()){

            try{

                $influencer = $this->influencer
                ->where('id_user', session('id'))
                ->where('id_campaign', $request->get('id'))
                ->pluck('id')
                ->toArray();

                if($influencer){

                    $urls = $this->url
                    ->where('id_user', session('id'))
                    ->whereIn('id_influencer', $influencer)
                    ->pluck('id')->toArray();

                    if($urls){

                        $this->urlResult->where('id_user', session('id'))->whereIn('id_url', $urls)->delete();

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

                    $this->influencer->where('id_user', session('id'))->whereIn('id', $influencer)->delete();
                }

                $deleteCampaign = $this->campaign
                ->where('id_user', session('id'))
                ->where('id', $request->get('id'))
                ->delete();

                if($deleteCampaign){
                    return 'delete-true';
                }

            } catch (PDOException $e) {
                return 'error-exception';
            }
        }
    }

    //Edit campaign
    public function edit(Request $request)
    {
        if($request->ajax()){
            $campaign = $this->campaign->find($request->get('id'));
            return json_encode($campaign);
        }
    }

    //Update campaign
    public function update(Request $request)
    {
        if($request->ajax()){

            try{

                $campaign = $this->campaign
                ->where('id_user', session('id'))
                ->where('name', $request->get('name'))
                ->first();

                if(!empty($campaign) && $campaign->id != $request->get('id')){
                    return 'name-existing';
                }else{
                    $this->campaign->where('id', $request->get('id'))->update(['name' => $request->get('name')]);
                    return 'register-ok';
                }

            } catch (PDOException $e) {
                return 'error-exception';
            }
        }
    }
}
