<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BanksController;
use App\Http\Controllers\TransactionsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(UsersController::class)
->name('users.')
->prefix('users')
->group(function(){
    
});

Route::resource('users',UsersController::class);
Route::resource('banks',BanksController::class);
Route::resource('transactions',TransactionsController::class);