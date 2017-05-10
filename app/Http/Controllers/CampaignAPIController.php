<?php

namespace App\Http\Controllers;

use App\User;
use App\Campaign;
use Illuminate\Http\Request;

class CampaignAPIController extends Controller
{

    private $user;
    private $campaign;

    public function __construct(User $user, Campaign $campaign){
        $this->user = $user;
        $this->campaign = $campaign;
    }

    //Register Campaign
    public function store(Request $request){

        $name = $request->get('name');
        $token = $request->get('token');

        //Validate parameters
        if(!$name || !$token){
            
            $validation = ['status' => 'validation-false'];

            if(!$name){
                $validation['name'] = 'required';
            }

            if(!$token){
                $validation['token'] = 'required';
            }
            
            return json_encode($validation);
        }
        

        try{

            //Checks the existence of the user
            $user = $this->user->where('token', $token)->first();

            if(!$user){
                
                $validateToken = ['status' => 'token-invalid', 'msg' => 'O token informado não está vinculado a nenhum usuário válido!'];
                return json_encode($validateToken);

            }else{

                //Checks the existence of the campaign
                $validateCampaign = $this->campaign->where('name', $name)->where('id_user', $user->id)->first();

                if($validateCampaign){

                     $existingCampaing = ['status' => 'validation-campaign', 'msg' => 'Uma campanha já se encontra registrada com o mesmo nome!'];
                     return json_encode($existingCampaing);

                }else{
                    
                    $Campaign = $this->campaign->create([
                        'id_user' => $user->id,
                        'name' => $name,
                    ]);

                    $dataNewCampaign = [
                        'status' => 'register-true',
                        'id' => $Campaign->id,
                        'id_user' => $Campaign->id_user,
                        'name' => $Campaign->name,
                        'created_at' => $Campaign->created_at->format('m/d/Y')
                    ];

                    return json_encode($dataNewCampaign);
                }
            }
            die;

            


        }catch (PDOException $e) {
           return json_encode($error = ['status' => 'register-false']);
        }
    }
}
