<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Login;
use App\Http\Livewire\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',Dashboard::class);
Route::get('/dashboard',Dashboard::class);
Route::get('/user',function(){
	return view('user');
});

Route::get('/login',Login::class);
