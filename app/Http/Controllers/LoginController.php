<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    private $userModel;

    public function __construct(User $user){
        $this->userModel = $user;
    }

    //Shows login screen
    public function index(){
        return view('login.index');
    }

    //Register user
    public function store(){

        dd(Input::all());

        try{

            $user_table = [
                'name' => Input::get('name'),
                'company_name' => Input::get('company_name'),
                'email' => Input::get('email'),
                'telephone' => Input::get('telephone'),
                'password' => Input::get('password')
            ];
          
            $this->userModel->create($user_table);

            return 'register-ok';

        } catch (PDOException $e) {
          
            return 'register-error';
        }
    }
}
