<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Mail\RegisterUserAPIMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class UserAPIController extends Controller
{

    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    //Register User
    public function store(Request $request){
       
        // Validate inputs
        if(!$request->get('name') || !$request->get('email')){
            
            $validation = ['status' => 'validation-false'];

            if(!$request->get('name')){
                $validation['name'] = 'required';
            }

            if(!$request->get('email')){
                $validation['email'] = 'required';
            }
            
            return json_encode($validation);
        }

        try{

            $validateEmail = $this->user->where('email', $request->get('email'))->first();

            if($validateEmail){
                return json_encode($checkEmail = ['status' => 'email-exists-true', 'check-email' => 'O e-mail informado já está cadastrado.']);
            }else{

                $dataUser = $this->user->create([
                        'email' => $request->get('email'),
                        'password' => Hash::make('Tracking2017$'),
                        'name' => $request->get('name'),
                        'company_name' => $request->get('company_name'),
                        'telephone' => $request->get('telephone'),
                        'token' => Hash::make($request->get('email'))
                    ]);

                $registeredUser = [
                    'status' => 'register-true',
                    'id' => $dataUser->id,
                    'name' => $dataUser->name,
                    'company_name ' => $dataUser->company_name,
                    'email ' => $dataUser->email,
                    'telephone ' => $dataUser->telephone,
                    'token ' => $dataUser->token,
                    'created_at' => $dataUser->created_at->format('m/d/Y')
                ];

                Mail::to($dataUser->email)->send(new RegisterUserAPIMail($dataUser));

                return json_encode($registeredUser);
            }
        } catch (PDOException $e) {
            return json_encode($error = ['status' => 'register-false']);
        }
    }

}
