<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfessionalController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\RatingController;

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
Route::get('/login',Login::class)->name('login');
Route::group(['middleware' => 'auth'], function () {
	Route::get('/',Dashboard::class);
	Route::get('/dashboard',Dashboard::class);

	Route::get('/user',[UserController::class,'index']);
	Route::post('/user',[UserController::class,'add']);
	Route::patch('/user/{id}',[UserController::class,'edit']);
	Route::delete('/user/{id}',[UserController::class,'delete']);

	Route::get('/professional',[ProfessionalController::class,'index']);
	Route::post('/professional',[ProfessionalController::class,'add']);
	Route::patch('/professional/{id}',[ProfessionalController::class,'edit']);
	Route::delete('/professional/{id}',[ProfessionalController::class,'delete']);


	Route::group(['prefix'=>'slider'],function(){
		Route::get('/homepage',[SliderController::class,'homepage']);
		Route::get('/product',[SliderController::class,'product']);
		Route::post('/add',[SliderController::class,'add']);
		Route::post('/edit/{id}',[SliderController::class,'edit']);
		Route::delete('/delete/{id}',[SliderController::class,'delete']);
	});

	Route::group(['prefix'=>'service'],function(){
		Route::get('',[ServiceController::class,'index']);
	});

	Route::group(['prefix'=>'schedule'],function(){
		Route::get('/',[ScheduleController::class,'index']);
		Route::patch('/{id}',[ScheduleController::class,'update']);
		Route::delete('/{id}',[ScheduleController::class,'delete']);
	});

	Route::group(['prefix'=>'booked'],function(){
		Route::get('/',[BookController::class,'index']);
		Route::patch('/{id}',[BookController::class,'update']);
		Route::post('/accept/{id}',[BookController::class,'accept']);
		Route::post('/reject/{id}',[BookController::class,'reject']);
		Route::delete('/{id}',[BookController::class,'delete']);
	});

	Route::group(['prefix'=>'review'],function(){
		Route::get('/',[ReviewController::class,'index']);
		Route::delete('/{id}',[ReviewController::class,'delete']);
	});

	Route::group(['prefix'=>'rating'],function(){
		Route::get('/',[RatingController::class,'index']);
		Route::delete('/{id}',[RatingController::class,'delete']);
	});

	Route::group(['prefix'=>'donation'],function(){
		Route::get('/',[DonationController::class,'index']);
		Route::delete('/{id}',[DonationController::class,'delete']);
	});

	Route::group(['prefix'=>'event'],function(){
		Route::get('/',[EventController::class,'index']);
		Route::post('/',[EventController::class,'create']);
		Route::delete('/{id}',[EventController::class,'delete']);
		Route::get('/edit/{id}',[EventController::class,'edit']);
		Route::patch('/edit/{id}',[EventController::class,'update']);
		Route::get('/add',[EventController::class,'add']);
	});

	Route::group(['prefix'=>'category'],function(){
		Route::get('/service',[ServiceCategoryController::class,'index']);
		Route::post('/service',[ServiceCategoryController::class,'add']);
		Route::patch('/service/{id}',[ServiceCategoryController::class,'edit']);
		Route::delete('/service/{id}',[ServiceCategoryController::class,'delete']);

		Route::get('/product',[ProductCategoryController::class,'index']);
		Route::post('/product',[ProductCategoryController::class,'add']);
		Route::patch('/product/{id}',[ProductCategoryController::class,'edit']);
		Route::delete('/product/{id}',[ProductCategoryController::class,'delete']);
	});
});


