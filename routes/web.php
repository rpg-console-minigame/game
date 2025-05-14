<?php

use App\Http\Controllers\PersonajeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ObjetoController;

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
Route::get('/map', function () {
    return view('loginMap');
})->name('map');

Route::get('/map/editor', [MapController::class, 'index'])->name('mapEditor');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/map/create', [MapController::class, 'create'])->name('create');
Route::post('/map/delete', [MapController::class, 'delete'])->name('delete');
Route::post('/map/update', [MapController::class, 'update'])->name('update');
Route::post('/map/createObject', [ObjetoController::class, 'create'])->name('createObject');
Route::post('/map/editObject/{id}', [ObjetoController::class, 'edit'])->name('editObject');
Route::post('/map/deleteObject', [ObjetoController::class, 'delete'])->name('deleteObject');


Route::post('/login', [UserController::class, 'login'])->name('loginEnter');
Route::post('/register', [UserController::class, 'register'])->name('registerEnter');
Route::post('createPj', [PersonajeController::class, 'create'])->name('createPj');

Route::post("/play", [UserController::class, 'play'])->name('play');


Route::get("/mapInfo", [MapController::class, 'mapInfo']);
Route::get('/info', [PersonajeController::class,'ifoApi'])->name('info');
Route::post('/input', [PersonajeController::class, 'inputConsole'])->name('input');

Route::get('/messages', [ChatController::class, 'index']);
Route::post('/messages', [ChatController::class, 'store']);