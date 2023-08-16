<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\User;
use Exception;

class BanksController extends Controller
{
    //
    public function index(){
        $banks = Bank::all();

        //dd($banks);

        return view('banks.index',compact('banks'));
    }

    public function create(Request $request){
        $bank = new Bank();

        return view('banks.create',compact('bank'));
    }

    public function store(Request $request){  
        try{
            if(!$request->has(['name','account','agency','user_id']))
            {
                throw new Exception('Existem campos obrigatórios à serem preenchidos!');
            }
            else if($request->input('balance') < 0){
                throw new Exception('O saldo Bancário deve ser maior ou igual à R$0,00');
            }
            else if(!User::find($request->input('user_id')))
            {
                throw new Exception('Usuário Inexistente!');
            }
            
            Bank::create($request->all());

            return back();
        }
        catch(Exception $e){
            return back()->withInput()->with(['erros' => $e->getMessage()]);
        }
    }

    public function edit(Request $request, Bank $bank){

        return view('banks.edit',compact('bank'));
    }

    public function update(Request $request, Bank $bank){
        try{
            if(!$request->has(['name','account','agency']))
            {
                throw new Exception('Existem campos obrigatórios à serem preenchidos!');
            }
            else if($request->input('balance') < 0){
                throw new Exception('O saldo Bancário deve ser maior ou igual à R$0,00');
            }
            
            $input = Arr::only($request->all(),['name','account','agency','status','balance']);
            $bank->update($input);

            return back();
        }
        catch(Exception $e){
            return back()->withInput()->with(['erros' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request, Bank $bank){
        $bank->delete();

        return back();
    }
}
