<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {return view('welcome');})->name('welcome');
Route::get('/map',  [MapController::class,'index']);
Route::get('/register', function () {return view('register');})->name('register');
Route::get('/login', function () {return view('login');})->name('login');
Route::post('/map/create',  [MapController::class,'create'])->name('create');
Route::post('/map/delete',  [MapController::class,'delete'])->name('delete');
Route::post('/map/update',  [MapController::class,'update'])->name('update');
Route::post('/login/enter', [UserController::class,'login'])->name('loginEnter');
Route::post('/register/enter', [UserController::class,'register'])->name('registerEnter');