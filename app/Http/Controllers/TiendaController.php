<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\TiendaOro;
use App\Models\Tienda;

class TiendaController extends Controller
{
    //

    public function index()
    {
        $tienda = \App\Models\TiendaOro::all();
        return view('tiendaOro', ['tienda' => $tienda]);
    }

    public function show(Request $request)
    {
        return view('formularioPago');
    }

    public function indexObjetos()
    {
        $tienda = \App\Models\Tienda::all();
        return view('tienda', ['tienda' => $tienda]);
    }

    public function showObjeto(Request $request)
    {
        return view('paginaCompra');
    }

    public function devolver(Request $request)
    {
        return view('welcome1');
    }
}
