<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Exception;
use App\Models\User;
use App\Models\Bank;

class TransactionsController extends Controller
{

    //index - create - store - edit - update - delete
    public function index(){
        $transactions = Transaction::all();

        return view('transactions.index',compact('transactions'));
    }

    public function create(Request $request){
        $transaction = new Transaction();

        return view('transactions.create',compact('transaction'));
    }

    public function store(Request $request){
        try{
            if(!$request->has(['value','type','payment_form','user_id','status','bank_id']))
            {
                throw new Exception('Existem campos obrigatórios à serem preenchidos!');
            }
            else if($request->input('value') < 0){
                throw new Exception('O valor do Lançamento não pode ser negativo');
            }
            else if(!Bank::find($request->input('banck_id')))
            {
                throw new Exception('Banco Inexistente!');
            }
            else if(!User::find($request->input('user_id')))
            {
                throw new Exception('Usuário Inexistente!');
            }
            
            Transaction::create($request->all());

            return back();
        }
        catch(Exception $e){
            return back()->withInput()->with(['erros' => $e->getMessage()]);
        }
    }

    public function edit(Request $request, Transaction $transaction){

        return view('transactions.edit',compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction){
        try{
            if(!$request->has(['value','type','payment_form','status']))
            {
                throw new Exception('Existem campos obrigatórios à serem preenchidos!');
            }
            else if($request->input('value') < 0){
                throw new Exception('O valor do Lançamento não pode ser negativo');
            }
            
            $input = Arr::only($request->all(),['value','type','payment_form','status','datail','realization_date','payment_date']);
            $transaction->update($input);

            return back();
        }
        catch(Exception $e){
            return back()->withInput()->with(['erros' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request, Transaction $transaction){
        $transaction->delete();

        return back();
    }
}
