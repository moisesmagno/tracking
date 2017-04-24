<?php

namespace App\Http\Controllers;

use App\Campaign;
use Illuminate\Http\Request;
use App\Http\Requests\CampaignRegisterRequest;

class CampaignController extends Controller
{

    private $campaign;

    public function __construct(Campaign $campaign)
    {
        $this->campaign = $campaign;
    }

    //Displays campaign home screen
    public function index()
    {
        $campaigns = $this->campaign->where('id_user', session('id'))
                                    ->orderBy('id', 'desc')
                                    ->get();

        return view('campaigns.home')->with(['campaigns' => $campaigns]);
    }

    //Register user
    public function store(CampaignRegisterRequest $request)
    {

        try{

            $campaign = $this->campaign->create([
                'id_user' => session('id'),
                'name' => $request->get('name')
            ]);

            if($campaign){
                session()->flash('alert-success', '<b>Sucesso!</b> A campanha foi adicionada.');
                return redirect()->back();

            }else{
                session()->flash('alert-danger', '<b>Erro!</b> Ocorreu uma falha ao tentar cadastrar a campanha, por favor tente novamente ou entre em contato.');
                return redirect()->back();
            }

        } catch (PDOException $e) {
            session()->flash('alert-danger', '<b>Erro!</b> Ocorreu uma falha crítica ao tentar cadastrar a campanha, por favor tente novamente ou entre em contato.');
            return redirect()->back();
        }
    }

    //Delete user
    public function destroy(Request $request)
    {
        if($request->ajax()){

            try{

                $delete = $this->campaign->find($request->get('id'))->delete();

                if($delete){
                    return 'true';
                }else{
                    return 'false';
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

                $update = $this->campaign->find($request->get('id'));

                if($update){
                    $update->update(['name' => $request->get('name')]);
                    return 'true';
                }else{
                    return 'false';
                }

            } catch (PDOException $e) {
                return 'error-exception';
            }
        }
    }
}
