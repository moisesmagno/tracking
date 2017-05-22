<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\URL;
use App\Result;
use App\PixelConversion;
use App\UserAccessInformation;
use App\Influencer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfluencerController extends Controller
{

    private $campaign;
    private $influencer;
    private $url;
    private $urlresult;
    private $pixel;

    public function __construct(Campaign $campaign, Influencer $influencer, URL $url, Result $urlresult, PixelConversion $pixel){
        $this->campaign = $campaign;
        $this->influencer = $influencer;
        $this->url = $url;
        $this->urlresult = $urlresult;
        $this->pixel = $pixel;
    }

    //Display the influencers screen
    public function index($id){

        //Session to be used in the page navigator
        session(['id_campaign' => $id]);

        $pixels = $this->pixel
            ->where('id_user', session('id'))
            ->where('id_influencer', NULL)
            ->get()
            ->toArray();

        $campaign = $this->campaign->find($id);

        $influencers = $this->influencer->where('id_campaign', $id)->get();

        return view('influencers.index')->with(['campaign' => $campaign, 'influencers' => $influencers, 'pixels' => $pixels]);
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

                $newInfluencer = $this->influencer->create([
                    'id_campaign' => $request->get('id_campaign'),
                    'name' => $request->get('name')
                ]);

                $this->pixel->find($request->get('pixel'))->update(['id_influencer' => $newInfluencer->id]);

                DB::commit();

                session()->flash('alert-success', '<b>Sucesso!</b> O Incluenciador foi adicionado.');
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
            $influencer = $this->influencer->find($request->get('id'));

            $pixel = $this->pixel
                ->where('id_user', session('id'))
                ->where('id_influencer', $influencer->id)
                ->first();

            $influencer->id_pixel = $pixel->id;
            $influencer->name_pixel = $pixel->name;

            return json_encode($influencer);
        }
    }

    //Update Influencer
    public function update(Request $request){

        if($request->ajax()){

            try{

                DB::beginTransaction();

                $influencer = $this->influencer
                    ->where('id_campaign', $request->get('id_campaign'))
                    ->where('name', $request->get('name'))
                    ->first();

                if(!empty($influencer) && $influencer->id != $request->get('id')){
                    return 'name-existing';
                }else{
                    $this->influencer->where('id', $request->get('id'))->update(['name' => $request->get('name')]);

                    //Remove id of influencer
                    $this->pixel
                        ->where('id_influencer', $request->get('id'))
                        ->where('id_user', session('id'))
                        ->update(['id_influencer' => NULL]);

                    //Add id influencer in new pixel
                    $this->pixel
                        ->where('id', $request->get('id_pixel'))
                        ->where('id_user', session('id'))
                        ->update(['id_influencer' => $request->get('id')]);

                    DB::commit();

                    return 'update-true';
                }

            } catch (PDOException $e) {
                DB::rollback();
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

                $urls = $this->url
                ->where('id_influencer', $request->get('id'))
                ->pluck('id')
                ->toArray();

                if($urls){

                    $this->urlresult->whereIn('id_url', $urls)->delete();
                    
                    $this->url->whereIn('id', $urls)->delete();
                }

                $pixel = $this->pixel
                    ->where('id_influencer', $request->get('id'))
                    ->update(['id_influencer' => NULL]);

                $deleteInfluencer = $this->influencer
                ->where('id', $request->get('id'))
                ->delete();

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
