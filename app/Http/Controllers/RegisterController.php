<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRegistertRequest;
use Illuminate\Support\Facades\DB;

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

            DB::beginTransaction();

            //Check existing email
            $email = $this->userModel->where('email', $request->email)->first();

            if($email){

                session()->flash('alert-warning', '<b>Atenção</b> O e-mail informado já está cadastrado!');

                return redirect()->back();

            }else{

                //Register new user
                $this->userModel->create([
                    'email' => $request->get('email'),
                    'password' => Hash::make($request->get('password')),
                    'name' => $request->get('name'),
                    'company_name' => ($request->get('company_name') != '') ? $request->get('company_name') : NULL,
                    'telephone' => ($request->get('telephone') != '') ? preg_replace("/\D+/", "", $request->get('telephone')) : NULL,
                    'token' => Hash::make($request->get('email'))
                ]);

                session()->flash('alert-success', '<b>Parabéns!</b> Você foi cadastrado com sucesso, acesse sua conta agora mesmo :)');

                DB::commit();

                return redirect('/');
            }

        } catch (PDOException $e) {
            DB::rollback();
            return redirect()->back();
        }
    }
}
