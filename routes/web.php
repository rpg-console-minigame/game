<?php

use App\Http\Controllers\PersonajeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatController;

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

Route::get('/', [UserController::class, 'wellcomeWithData'])->name('welcome');
Route::get('/map', [MapController::class, 'index']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/map/create', [MapController::class, 'create'])->name('create');
Route::post('/map/delete', [MapController::class, 'delete'])->name('delete');
Route::post('/map/update', [MapController::class, 'update'])->name('update');
Route::post('/login', [UserController::class, 'login'])->name('loginEnter');
Route::post('/register', [UserController::class, 'register'])->name('registerEnter');
Route::post('createPj', [PersonajeController::class, 'create'])->name('createPj');

Route::post("/play", [UserController::class, 'play'])->name('play');


Route::get("/mapInfo", [MapController::class, 'mapInfo']);

Route::get('/messages', [ChatController::class, 'index']);
Route::post('/messages', [ChatController::class, 'store']);