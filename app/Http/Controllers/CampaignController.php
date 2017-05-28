<?php

namespace App\Http\Controllers;

use App\Mark;
use App\Campaign;
use App\PixelConversion;
use Illuminate\Http\Request;
use App\Http\Requests\CampaignRegisterRequest;

class CampaignController extends Controller
{

    private $mark;
    private $campaign;
    private $pixel;

    public function __construct(Mark $mark, Campaign $campaign, PixelConversion $pixel)
    {
        $this->mark = $mark;
        $this->campaign = $campaign;
        $this->pixel = $pixel;
    }

    //Displays campaign home screen
    public function index($id)
    {
        //Session to be used in the page navigator
        session(['id_mask' => $id]);

        $mark = $this->mark->find($id);

        $campaigns = $this->campaign->with('getPixels')
                                    ->where('id_mark', $id)
                                    ->orderBy('id', 'desc')
                                    ->get();

        $pixels = $this->pixel->where('id_user', session('id'))->get();

        return view('campaigns.home')->with(['mark' => $mark, 'campaigns' => $campaigns, 'pixels' => $pixels]);
    }

    //Register Campaign
    public function store(CampaignRegisterRequest $request)
    {

        try{

            $campaign = $this->campaign->where('id_mark', $request->get('id_mark'))->where('name', $request->get('name'))->first();

            if(!$campaign){

                $this->campaign->create([
                    'id_mark' => $request->get('id_mark'),
                    'id_pixel' => (!empty($request->get('name'))) ? $request->get('pixel') : NULL,
                    'name' => $request->get('name'),
                ]);

                session()->flash('alert-success', '<b>Sucesso!</b> A campanha foi adicionada.');
                return redirect()->back();

            }else{
                session()->flash('alert-warning', '<b>Atenção!</b> Não foi possível cadastrar o nome da campanha, pois já existe outra campanha com o mesmo nome.');
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
                ->where('id_campaign', $request->get('id'))
                ->pluck('id')
                ->toArray();

                if($influencer){

                    $urls = $this->url
                    ->whereIn('id_influencer', $influencer)
                    ->pluck('id')->toArray();

                    if($urls){
                        $this->urlResult->whereIn('id_url', $urls)->delete();
                        $this->url->whereIn('id', $urls)->delete();
                    }

                    $this->influencer->whereIn('id', $influencer)->delete();
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

            $campaign = $this->campaign->with('getPixels')
                ->where('id', $request->get('id'))
                ->first();

            return json_encode($campaign);
        }
    }

    //Update campaign
    public function update(Request $request)
    {
        if($request->ajax()){

            try{

                $campaign = $this->campaign
                ->where('id_mark', $request->get('id_mark'))
                ->where('name', $request->get('name'))
                ->first();

                if(!empty($campaign) && $campaign->id != $request->get('id')){
                    return 'name-existing';
                }else{
                    $this->campaign->where('id', $request->get('id'))
                                    ->update([
                                        'name' => $request->get('name'),
                                        'id_pixel' => ($request->get('id_pixel')) ? $request->get('id_pixel') : NULL
                                    ]);

                    return 'register-ok';
                }

            } catch (PDOException $e) {
                return 'error-exception';
            }
        }
    }
}
