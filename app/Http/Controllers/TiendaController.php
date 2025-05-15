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
        $tienda = $tienda->map(function ($item) {
            return [
                'nombre' => $item->nombre,
                'img_url' => $item->img_url,
                'cantidad_oro' => $item->cantidad_oro,
                'precio' => $item->precio,
            ];
        });
        return view('tiendaOro', ['tienda' => $tienda]);
    }
}
