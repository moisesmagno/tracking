<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Mail\RecoverPassword;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RecoverPasswordController extends Controller
{

    private $userModel;

    public function __construct(User $user){
        $this->userModel = $user;
    }

    //Displays the password recovery screen
    public function index(){
        return view('recover_password.index');
    }

    public function update(UpdatePasswordRequest $request){

        $dataUser = $this->userModel->where('email', $request->get('email'))->first();

        if(!empty($dataUser)){

            $this->userModel->where('email', $dataUser->email)
                ->update(['password' => Hash::make('123456')]);

            Mail::to($dataUser->email)->send(new RecoverPassword($dataUser));

            session()->flash('alert-success', 'Enviamos para o seu <b>e-mail</b> as instruções para criar uma nova senha.');

        }else{
            session()->flash('alert-warning', '<b>Atenção! </b>O e-mail informado não está cadastrado!');
        }

        return redirect()->back();
    }
}

