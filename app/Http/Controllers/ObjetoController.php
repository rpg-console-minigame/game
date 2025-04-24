<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObjetoController extends Controller
{
    function create(Request $request){
        dd($request);
        return redirect('/map');
    }
}
