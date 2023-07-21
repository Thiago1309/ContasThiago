<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $name = 'Thiago';

        return view('dashboard.index',compact('name'));
    }
}
