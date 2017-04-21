<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Hash;

class ProfileUserController extends Controller
{

    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    //Show profile of user screen
    public function index(){
        return view('profile.index');
    }

    //Change password
    public function changePassword(ChangePasswordRequest $request){
        if($request->password == $request->password_confirmation){

            try{

                $this->user->where('id', session('id'))->update(['password' => Hash::make($request->password)]);

                session()->flash('alert-success', '<b>Sucesso! </b> As senhas foram alteradas.');
                return redirect()->back();

            } catch (Exception $e) {
                session()->flash('alert-danger', '<b>Erro! </b> Oorreu um ao tentar alterar a senha, por favor tente novamente ou entre em contato com o suporte.');
                return redirect()->back();
            }

        }else{
            session()->flash('alert-warning', '<b>Atenção! </b> As senhas informadas não são iguais.');
            return redirect()->back();
        }

        die;
    }
}
