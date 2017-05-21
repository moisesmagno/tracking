<?php

namespace App\Http\Controllers;

use App\Mark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarkController extends Controller
{
    private $mark;

    public function __construct(Mark $mark)
    {
        $this->mark = $mark;
    }

    //Displays mark home screen
    public function index(){

        $marks = $this->mark->where('id_user', session('id'))
            ->orderBy('id', 'desc')
            ->get();

        return view('marks.home')->with(['marks' => $marks]);
    }

    //Register Mark
    public function store(Request $request){

        try{

            DB::beginTransaction();

            $mark = $this->mark->where('id_user', session('id'))->where('name', $request->get('name'))->first();

            if(!$mark){

                $this->mark->create([
                    'id_user' => session('id'),
                    'name' => $request->get('name')
                ]);

                DB::commit();

                session()->flash('alert-success', '<b>Sucesso!</b> A marca foi adicionada.');
                return redirect()->back();

            }else{
                session()->flash('alert-warning', '<b>Atenção!</b> Não foi possível alterar o nome da marca, pois já existe outra marca com o mesmo nome.');
                return redirect()->back();
            }

        } catch (PDOException $e) {

            DB::rollback();

            session()->flash('alert-danger', '<b>Erro!</b> Ocorreu uma falha crítica ao tentar cadastrar a marca, por favor tente novamente ou entre em contato.');
            return redirect()->back();
        }

    }

    //Edit Mark
    public function edit(Request $request){

        if($request->ajax()){
            $mark = $this->mark->find($request->get('id'));
            return json_encode($mark);
        }
    }

    //Update Mark
    public function update(Request $request){

        if($request->ajax()){

            try{

                DB::beginTransaction();

                $mark = $this->mark
                    ->where('id_user', session('id'))
                    ->where('name', $request->get('name'))
                    ->first();

                if(!empty($mark) && $mark->id != $request->get('id')){
                    return 'name-existing';
                }else{
                    $this->mark->where('id', $request->get('id'))->update(['name' => $request->get('name')]);

                    DB::commit();

                    return 'register-ok';
                }

            } catch (PDOException $e) {
                DB::rollback();
                return 'error-exception';
            }
        }
    }

    //Delete Mark
    public function destroy(){

    }
}
