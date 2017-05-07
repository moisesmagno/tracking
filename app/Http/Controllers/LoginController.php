<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ValidateUserRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    //Shows login screen
    public function index(){
        return view('login.index');
    }

    //Validate User
    public function validateLogin(ValidateUserRequest $request){

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $data_users = $this->user->where('email', $request->email)->first();

            if($data_users){
                session(['id' => Auth::user()->id]);
                session(['name' => Auth::user()->name]);
                session(['company_name' => Auth::user()->company_name]);
                session(['email' => Auth::user()->email]);
                session(['telephone' => Auth::user()->telephone]);
                session(['token_user' => Auth::user()->token]);

                return redirect()->intended('campanha/home');
            }
        }else{
            session()->flash('alert-danger', '<b>Erro!</b> E-mail ou senha incorretos!');
            return redirect('/')->with(['email' => $request->email]);
        }

    }

    //Logout
    public function logout(){
        Auth::logout();
        return redirect()->to('/');
    }
}
