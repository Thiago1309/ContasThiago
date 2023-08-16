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
            
            return view('users.index',compact('users'));
        }
    
        public function create(Request $request){
            $user = new user();
    
            return view('users.create',compact('user'));
        }
    
        public function store(Request $request){
            try{
                if(!$request->has(['name','email','password'])){
                    throw new Exception('Existem Campos Obrigatórios à serem preenchdos');
                }
                if(User::where('email',$request->get('email'))->count() > 0)
                {
                    throw new Exception('Email já cadastrado!');
                }

                $password = bcrypt($request->get('password'));
                $input = $request->all();
                $input['password'] = $password;
                User::create($input);

                return back()->with(['sucsses' => 'Usuário Salvo com sucesso!']);
            }
            catch(Exception $e){
                
                report($e);
                return back()->withInput()->with(['errors' => $e->getMessage()]);
            }
        }
    
        public function edit(Request $request, User $user){
    
            return view('users.edit',compact('user'));
        }
    
        public function update(Request $request, User $user){
            try{
                if(!$request->has(['name','email'])){
                    throw new Exception('Existem Campos Obrigatórios à serem preenchdos');
                }
                if(User::where('email',$request->get('email'))->where('id','<>',$user->id)->count() > 0)
                {
                    throw new Exception('Email já cadastrado!');
                }
                
                $input = $request->all();
                
                if($request->get('password')){
                    $password = bcrypt($request->get('password'));
                    $input['password'] = $password;
                }
                
                $user->update($input);
                
                return back()->with(['sucsses' => 'Usuário Salvo com sucesso!']);
            }
            catch(Exception $e){
                
                report($e);
                return back()->withInput()->with(['errors' => $e->getMessage()]);
            }            
        }
    
        public function destroy(Request $request, User $user){
            $user->delete();
    
            return back();
        }
}
