<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;

class UsersController extends Controller
{
        //index - create - store - edit - update - delete
        public function index(){
            $users = User::all();
    
            return view('user.index',compact('users'));
        }
    
        public function create(Request $request){
            $user = new user();
    
            return view('user.create',compact('user'));
        }
    
        public function store(Request $request){
            try{
                if(!$request->has(['name','email','password'])){
                    throw new Exception('Existem Campos Obrigatórios à serem preenchdos');
                }
                
                User::create($request->all());

                return back()->with(['sucsses' => 'Usuário Salvo com sucesso!']);
            }
            catch(Exception $e){
                
                report($e);
                return back()->withInput()->with(['errors' => $e->getMessage()]);
            }
            
    
        }
    
        public function edit(Request $request, User $user){
    
            return view('user.edit',compact('user'));
        }
    
        public function update(Request $request, User $user){
            $user->update($request->all());
    
            return back();
        }
    
        public function delete(Request $request, User $user){
            $user->delete();
    
            return back();
        }
}
