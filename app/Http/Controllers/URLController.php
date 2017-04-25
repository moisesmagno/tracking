<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\URL;
use Illuminate\Http\Request;
use App\Http\Requests\URLResgisterRequest;

class URLController extends Controller
{

    private $campaign;
    private $url;

    public function __construct(Campaign $campaign, URL $url)
    {
        $this->campaign = $campaign;
        $this->url = $url;
    }

    //Displays the list of urls
    public function index($id){

        $campaign = $this->campaign->find($id);

        $urls = $this->url->where('id_campaign', $id)->orderBy('id', 'desc')->get();

        return view('urls.urls')->with(['campaign' => $campaign, 'urls' => $urls]);
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
                'id_campaign' => $request->get('id_campaign'),
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

                $update = $this->url->find($request->get('id'));

                if($update){
                    $update->update([
                        'description' => $request->get('description'),
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

    //Delete URL
    public function destroy(Request $request)
    {
        if($request->ajax()){

            try{

                $delete = $this->url->find($request->get('id'))->delete();

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
}
