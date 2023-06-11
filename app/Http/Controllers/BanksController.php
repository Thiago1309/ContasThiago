<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;

class BanksController extends Controller
{
    //
    public function index(){
        $banks = Bank::all();

        return view('banks.index',compact('banks'));
    }

    public function create(Request $request){
        $bank = new Bank();

        return view('banks.create',compact('bank'));
    }

    public function store(Request $request){
        if(bank_validation($request))
        {
            Bank::create($request->all());
        }
        return back();
    }

    public function edit(Request $request, Bank $bank){

        return view('banks.edit',compact('bank'));
    }

    public function update(Request $request, Bank $bank){
        if(bank_validation($request))
        {
            $bank->update($request->all());
        }
        
        return back();
    }

    public function delete(Request $request, Bank $bank){
        $bank->delete();

        return back();
    }

    private function bank_validation($bank){
        if($bank->has(['name','account','agency','user_id']))
        {
            if($bank->input('balance') < 0)
            {
                return true;
            }
        }
        else{
            return false;
        }
    }
}
