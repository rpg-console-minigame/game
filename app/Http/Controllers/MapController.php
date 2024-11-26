<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    function index() {
        $map = \App\Models\Zona::all();
        return view("mapEditor", ["map" => $map]);
    }
    function create(Request $request) {
        // crear una nueva entrada en la base de datos con los datos del formulario
        $zone = new  \App\Models\Zona;
        $zone->coord_x = request("coord_x");
        $zone->coord_y = request("coord_y");
        // $zone->nombre = request("nombre");
        // $zone->ruta_IMG = request("ruta_IMG");
        // $zone->descripcion = request("descripcion");
        // $zone->up_door = request("up_door");
        // $zone->down_door = request("down_door");
        // $zone->left_door = request("left_door");
        // $zone->right_door = request("right_door");

        $zone->nombre = "sala por form";
        $zone->descripcion = "sala por form";
        $zone->up_door = true;
        $zone->down_door = true;
        $zone->left_door = true;
        $zone->right_door = true;

        $zone->save();
        return redirect("/map")->with("success",true);
    }
    function delete(Request $request) {
        // borrar una entrada de la base de datos
        $zone = \App\Models\Zona::all()->where("coord_x", $request->coord_x)->where("coord_y", $request->coord_y)->first();
        $zone->delete();
        return redirect("/map")->with("success",true);
    }
}
