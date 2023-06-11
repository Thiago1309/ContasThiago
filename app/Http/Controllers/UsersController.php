<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
        //index - create - store - edit - update - delete
        public function index(){
            $users = user::all();
    
            return view('user.index',compact('users'));
        }
    
        public function create(Request $request){
            $user = new user();
    
            return view('user.create',compact('user'));
        }
    
        public function store(Request $request){
            user::create($request->all());
    
            return back();
        }
    
        public function edit(Request $request, user $user){
    
            return view('user.edit',compact('user'));
        }
    
        public function update(Request $request, user $user){
            $user->update($request->all());
    
            return back();
        }
    
        public function delete(Request $request, user $user){
            $user->delete();
    
            return back();
        }
}
