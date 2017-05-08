<?php

namespace App\Http\Controllers;

use App\PixelConversion;
use App\UserAccessInformation;
use App\Http\Requests\PixelConversionRequest;
use Illuminate\Http\Request;

class PixelConversionController extends Controller
{
    
    private $pixelConversion;
    private $userAccessInformation;

    public function __construct(PixelConversion $pixelConversion, UserAccessInformation $userAccessInformation){
    	$this->pixelConversion = $pixelConversion;
        $this->userAccessInformation = $userAccessInformation;
    }

    //Displays the conversion pixel screen
    public function index(){

       $pixels = $this->pixelConversion->with('usersAccessInformations')->where('id_user', session('id'))->get();

    //    foreach($pixels as $key){
    //         echo count($key->usersAccessInformations);
    //         // count((array)$obj)
    //     }
        
    //     die;

        // $pixeis = $this->pixelConversion->where('id_user', session('id'))->get(['id', 'name', 'time_interval', 'interval_type', 'created_at']);
        return view('pixel_conversion.index')->with(['pixels' => $pixels]);
    }

    //Register the conversion pixel
    public function store(PixelConversionRequest $request){

        if($request->name == '' || $request->interval == ''){
            session()->flash('alert-danger', '<b>Erro!</b> Para criar um pixel de converção você precisa preencher todos os campos obrigatórios.');
            return redirect()->back();
        }

        $interval = explode('|', $request->interval);
        $time_interval = $interval[0];
        $interval_type = $interval[1];

        try{
            
            $this->pixelConversion->create([
                'id_user' => session('id'),
                'name' => $request->name,
                'time_interval' => $time_interval,
                'interval_type' => $interval_type,
            ]);

            session()->flash('alert-success', '<b>Sucesso!</b> Pixel de conversão cadastrado.');
            
            return redirect()->back();

        } catch (PDOException $e) {
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
                
                $interval = explode('|', $request->get('interval'));
                $time_interval = $interval[0];
                $interval_type = $interval[1];

                $update = $this->pixelConversion->find($request->get('id'));

                if($update){
                    $update->update([
                        'name' => $request->get('name'),
                        'time_interval' => $time_interval,
                        'interval_type' => $interval_type,
                    ]);

                    return 'true';

                }else{
                    return 'false';
                }

            } catch (PDOException $e) {
                return 'error-exception';
            }
        }

    }

    //Destroy Pixel Conversion
    public function destroy(Request $request){

        if($request->ajax()){

            try{

                $this->pixelConversion->where('id', $request->get('id'))->delete();

                return 'true';

            } catch (PDOException $e) {
                return 'error-exception';
            }
        }
    }


}


