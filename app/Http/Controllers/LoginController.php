<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ValidateUserRequest;
use Illuminate\Support\Facades\Hash;

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

        if (\Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $data_users = $this->user->where('email', $request->email)->first();

            if($data_users){
                session('name', $data_users->name);
                session('company_name', $data_users->company_name);
                session('email', $data_users->email);
                session('telephone', $data_users->telephone);

                return redirect()->intended('admin/home');
            }
        }
    }

    //Logout
    public function logout(){
        \Auth::logout();
        return redirect()->to('/');
    }
}
