<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Influencer;
use App\Result;
use App\PixelConversion;
use App\UserAccessInformation;
use App\Http\Requests\PixelConversionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PixelConversionController extends Controller
{

    private $campaign;
    private $influencer;
    private $pixelConversion;
    private $userAccessInformation;

    public function __construct(Campaign $campaign, Influencer $influencer, Result $urlResult, PixelConversion $pixelConversion, UserAccessInformation $userAccessInformation){
    	$this->campaign = $campaign;
    	$this->influencer = $influencer;
        $this->urlResult = $urlResult;
        $this->pixelConversion = $pixelConversion;
        $this->userAccessInformation = $userAccessInformation;
    }

    //Displays the conversion pixel screen
    public function index(){


        //Pixel data and conversions
       $pixels = $this->pixelConversion
           ->with('getCampaigns')
           ->with('usersAccessInformations')
           ->where('id_user', session('id'))
           ->get();

        return view('pixel_conversion.index')->with(['pixels' => $pixels]);
    }

    //Register the conversion pixel
    public function store(PixelConversionRequest $request){

        if($request->name == '' || $request->value  == '' || $request->interval == '' || $request->value == ''){
            session()->flash('alert-danger', '<b>Erro!</b> Para criar um pixel de converção você precisa preencher todos os campos obrigatórios.');
            return redirect()->back();
        }

        $interval = explode('|', $request->interval);
        $time_interval = $interval[0];
        $interval_type = $interval[1];

        try{

            DB::beginTransaction();

            $pixel = $this->pixelConversion->create([
                'id_user' => session('id'),
                'name' => $request->name,
                'value' => str_replace(',', '.', str_replace('.', '', $request->value)),
                'time_interval' => $time_interval,
                'interval_type' => $interval_type,
            ]);

            session()->flash('alert-success', '<b>Sucesso!</b> Pixel de conversão cadastrado.');

            DB::commit();

            return redirect()->back();

        } catch (PDOException $e) {

            DB::rollback();

            session()->flash('alert-danger', '<b>Erro!</b> Ocorreu uma falha crítica ao tentar cadastrar o pixel de conversão, por favor tente novamente ou entre em contato.');
            return redirect()->back();
        }
    }

    //Edit Pixel Conversion
    public function edit(Request $request){
        if($request->ajax()){
            $pixelConversion = $this->pixelConversion->find($request->get('id'));
            return json_encode($pixelConversion);
        }
    }

    //Update Pixel Conversion
    public function update(Request $request){
        
        if($request->ajax()){

            try{

                DB::beginTransaction();

                $interval = explode('|', $request->get('interval'));
                $time_interval = $interval[0];
                $interval_type = $interval[1];

                $valor = $request->get('value');

                $update = $this->pixelConversion->find($request->get('id'));

                if($update){

                    $update->update([
                        'name' => $request->get('name'),
                        'value' => str_replace(',', '.', str_replace('.', '', $valor)),
                        'time_interval' => $time_interval,
                        'interval_type' => $interval_type,
                    ]);

                    DB::commit();

                    return 'true';

                }else{
                    return 'false';
                }

            } catch (PDOException $e) {
                DB::rollback();
                return 'error-exception';
            }
        }

    }

    //Destroy Pixel Conversion
    public function destroy(Request $request){

        if($request->ajax()){

            try{

                DB::beginTransaction();

                //Delete Conversion Pixel
                $pixel = $this->pixelConversion
                    ->where('id_user', session('id'))
                    ->where('id', $request->get('id'))
                    ->delete();

                if($pixel){
                    DB::commit();
                    return 'true';
                }

            } catch (PDOException $e) {
                DB::rollback();
                return 'error-exception';
            }
        }
    }

}


