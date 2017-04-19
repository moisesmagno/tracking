<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRegistertRequest;

class RegisterController extends Controller
{
    private $userModel;

    public function __construct(User $user){
        $this->userModel = $user;
    }

    //Displays the registration screen
    public function index(){
        return view('register.index');
    }

    //Register user
    public function store(UserRegistertRequest $request){

        try{
            $this->userModel->create([
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                'name' => $request->get('name'),
                'company_name' => $request->get('company_name'),
                'telephone' => $request->get('telephone')
            ]);

            session()->flash('message-success', '<b>Sucesso</b> Usuario cadastrado com sucesso!');

            return redirect()->back();

        } catch (PDOException $e) {
            return redirect()->back();
        }
    }
}
