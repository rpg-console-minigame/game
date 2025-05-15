<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\TiendaOro;

class TiendaController extends Controller
{
    //

    public function index()
{
    $tienda = \App\Models\TiendaOro::all();
    return view('tiendaOro', ['tienda' => $tienda]);
}

}
