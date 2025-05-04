<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objeto;
use App\Models\Zona;

class ObjetoController extends Controller
{
    function create(Request $request){
        $objeto = new Objeto();
        $objeto->nombre = $request->input('nombre');
        $objeto->function_name = $request->input('function_name');
        $objeto->durabilidad = $request->input('durabilidad');
        $objeto->descripcion = $request->input('descripcion');
        $objeto->zona_ID = $request->input('zona_ID');
        $objeto->coste = $request->input('coste');
        $objeto->minutos = $request->input('minutos');
        $objeto->save();
        return redirect('/map')->with('success', 'Objeto creado exitosamente!');
    }
    function edit(Request $request, $id){
        $objeto = Objeto::find($id);
        if ($objeto) {
            $objeto->nombre = $request->input('nombre');
            $objeto->function_name = $request->input('function_name');
            $objeto->durabilidad = $request->input('durabilidad');
            $objeto->descripcion = $request->input('descripcion');
            $objeto->coste = $request->input('coste');
            $objeto->minutos = $request->input('minutos');
            $objeto->zona_ID = $request->input('zona_ID');
            $objeto->save();
            return redirect('/map')->with('success', 'Objeto editado exitosamente!');
        } else {
            return redirect('/map')->with('error', 'Objeto no encontrado!');
        }
    }
    function delete(Request $request){
        $id = $request->input('id');
        $objeto = Objeto::find($id);
        if ($objeto) {
            $objeto->delete();
            return redirect('/map')->with('success', 'Objeto eliminado exitosamente!');
        } else {
            return redirect('/map')->with('error', 'Objeto no encontrado!');
        }
    }
}
