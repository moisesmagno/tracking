<?php

/**
 * Created by PhpStorm.
 * User: Moisés
 * Date: 16/04/2017
 * Time: 19:50
 */

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

        try{
            DB::beginTransaction();
            $this->userModel->name = Input::get('name');
            $this->userModel->company_name = Input::get('company_name');
            $this->userModel->email = Input::get('email');
            $this->userModel->telephone = Input::get('telephone');
            $this->userModel->password = Input::get('password');
            $this->userModel->save();
            DB::commit();

            return 'register-ok';

        } catch (PDOException $e) {
            DB::rollBack();
            return 'register-error';
        }
    }
}
