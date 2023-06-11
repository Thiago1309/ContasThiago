<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionsController extends Controller
{

    //index - create - store - edit - update - delete
    public function index(){
        $transactions = Transaction::all();

        return view('transaction.index',compact('transactions'));
    }

    public function create(Request $request){
        $transaction = new Transaction();

        return view('transaction.create',compact('transaction'));
    }

    public function store(Request $request){
        Transaction::create($request->all());

        return back();
    }

    public function edit(Request $request, Transaction $transaction){

        return view('transaction.edit',compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction){
        $transaction->update($request->all());

        return back();
    }

    public function delete(Request $request, Transaction $transaction){
        $transaction->delete();

        return back();
    }
}
