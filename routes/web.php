<?php

use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ObjetoController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EnemigoController;
use App\Http\Controllers\PersonajeController;

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

Route::get('/map/editor', [MapController::class, 'showLogin'])->name('mapEditorLogin');
Route::post('/map/editor', [MapController::class, 'processLogin'])->name('mapEditorLoginPost');
Route::get('/map/editor/dashboard', [MapController::class, 'dashboard'])->name('mapEditor');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/map/create', [MapController::class, 'create'])->name('create');
Route::post('/map/delete', [MapController::class, 'delete'])->name('delete');
Route::post('/map/update', [MapController::class, 'update'])->name('update');
Route::post('/map/createObject', [ObjetoController::class, 'create'])->name('createObject');
Route::post('/map/editObject/{id}', [ObjetoController::class, 'edit'])->name('editObject');
Route::post('/map/deleteObject', [ObjetoController::class, 'delete'])->name('deleteObject');
Route::post('/enemigos/create', [EnemigoController::class, 'create'])->name('createEnemy');
Route::post('/enemigos/update/{id}', [EnemigoController::class, 'update'])->name('updateEnemy');
Route::post('/enemigos/delete', [EnemigoController::class, 'delete'])->name('deleteEnemy');



Route::post('/login', [UserController::class, 'login'])->name('loginEnter');
Route::post('/register', [UserController::class, 'register'])->name('registerEnter');
Route::post('createPj', [PersonajeController::class, 'create'])->name('createPj');

Route::post("/play", [UserController::class, 'play'])->name('play');
Route::post("/deletePj/{id}", [PersonajeController::class, 'delete'])->name('deletePj');


Route::get("/mapInfo", [MapController::class, 'mapInfo']);
Route::get('/info', [PersonajeController::class,'ifoApi'])->name('info');
Route::post('/input', [PersonajeController::class, 'inputConsole'])->name('input');

Route::get('/messages', [ChatController::class, 'index']);
Route::post('/messages', [ChatController::class, 'store']);
Route::get('/tiendaOro', [TiendaController::class, 'index'])->name('tiendaOro');
Route::get('/compra', [TiendaController::class, 'show'])->name('tiendaOroShow');
Route::get('/tiendaObjetos', [TiendaController::class, 'indexObjetos'])->name('tiendaObjetos');
Route::post('/pagoRealizado', [TiendaController::class, 'showObjeto'])->name('pagoRealizado');
Route::get('/devolver', [TiendaController::class, 'devolver'])->name('devolver');

Route::post('/enviarMensaje', [ContactController::class,'index'])->name('enviarMensaje');


Route::get('/sobreNosotros', function () {
    return view('sobreNosotros');
})->name('sobreNosotros');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

// web.php
Route::post('/paypal/create', [PayPalController::class, 'create']);
Route::post('/paypal/complete', [PayPalController::class, 'complete']);



