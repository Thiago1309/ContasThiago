<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{UsersController,
                            BanksController,
                            TransactionsController,
                            DashboardController};


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

Route::controller(DashboardController::class)
->name('dashboard.')
->group(function(){
    Route::get('/','index')->name('index');
});

Route::controller(UsersController::class)
->name('users.')
->prefix('users')
->group(function(){
     
});

Route::resource('users',UsersController::class);
Route::resource('banks',BanksController::class);
Route::resource('transactions',TransactionsController::class);