<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Influencer;
use App\Result;
use App\UserAccessInformation;
use App\PixelConversion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfluencerController extends Controller
{

    private $campaign;
    private $influencer;
    private $pixel;
    private $result;
    private $userAccess;

    public function __construct(Campaign $campaign, Influencer $influencer, PixelConversion $pixel, Result $result, UserAccessInformation $userAccess){
        $this->campaign = $campaign;
        $this->influencer = $influencer;
        $this->pixel = $pixel;
        $this->result = $result;
        $this->userAccess = $userAccess;
    }

    //Display the influencers screen
    public function index($id){

        //Session to be used in the page navigator
        session(['id_campaign' => $id]);

        //Campaign
        $campaign = $this->campaign->find($id);

        //Influencers
        $influencers = $this->influencer
            ->with('getInfluencers')
            ->where('id_campaign', $id)
            ->get();

        //Pixel
        $pixel = $this->pixel->find($campaign->id_pixel);

        return view('influencers.index')->with(['campaign' => $campaign, 'influencers' => $influencers, 'pixel' => $pixel]);
    }

    //Register influencer
    public function store(Request $request){
        try{

            DB::beginTransaction();

            $influencer = $this->influencer
            ->where('id_campaign', $request->get('id_campaign'))
            ->where('name', $request->get('name'))
            ->first();

            if(!$influencer){

                $validate = true;
                while($validate == true){
                    //Generates the URL code
//                    $code_url = chr(rand(65,90)) . rand(1, 99) . chr(rand(65,90)) . rand(1, 9) . chr(rand(65,90)) . rand(1, 9) . chr(rand(65,90));
                    $code_url = chr(rand(65,90)) . rand(1, 99);
                    $code = $this->influencer->where('short_url', PATH_SHORT_URL.$code_url)->first();

                    if($code){
                        $validate = true;
                    }else{
                        $short_url = PATH_SHORT_URL.$code_url;
                        $validate = false;
                    }
                }

                $newInfluencer = $this->influencer->create([
                    'id_campaign' => $request->get('id_campaign'),
                    'name' => $request->get('name'),
                    'destiny_url' => $request->get('destiny_url'),
                    'short_url' => $short_url
                ]);

                DB::commit();

                session()->flash('alert-success', '<b>Sucesso!</b> O Influenciador foi adicionado.');
                return redirect()->back();

            }else{

                session()->flash('alert-warning', '<b>Atenção!</b> Já existe um influenciador cadastrado com o mesmo nome.');
                return redirect()->back();
            }

        } catch (PDOException $e) {
            DB::rollback();
            session()->flash('alert-danger', '<b>Erro!</b> Ocorreu uma falha crítica ao tentar cadastrar o influenciador, por favor tente novamente ou entre em contato.');
            return redirect()->back();
        }

    }

    //Edit Influencer
    public function edit(Request $request)
    {
        if($request->ajax()){
            $url = $this->influencer->find($request->get('id'));
            return json_encode($url);
        }
    }

    //Update Influencer
    public function update(Request $request){

        if($request->ajax()){

            try{

                $influencer = $this->influencer
                    ->where('id_campaign', $request->get('id_campaign'))
                    ->where('name', $request->get('name'))
                    ->first();

                if(!empty($influencer) && $influencer->id != $request->get('id')){

                    return 'name-existing';

                }else{

                    $this->influencer
                        ->where('id', $request->get('id'))
                        ->where('id_campaign', $request->get('id_campaign'))
                        ->update([
                            'name' => $request->get('name'),
                        ]);
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

                DB::beginTransaction();

                $id = $request->get('id');

//                $results = $this->result->where('id_influencer', $id)->delete();
//
//                $usserAccess = $this->userAccess->where('id_influencer', $id)->delete();

                $deleteInfluencer = $this->influencer->find($id)->delete();

                if($deleteInfluencer){

                    DB::commit();

                    return 'delete-true';
                }

            } catch (PDOException $e) {
                DB::rollback();
                return 'error-exception';
            }
        }
    }
}
