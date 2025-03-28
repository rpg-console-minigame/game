<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MapController extends Controller
{
    function index() {
        $map = \App\Models\Zona::all();
        return view("mapEditor", ["map" => $map]);
    }
    function create(Request $request) {
        $data =[
            'nombre' => $request['nombre'],
            'descripcion' => $request['descripcion']
        ];

        $validator = Validator::make($data,
        [
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string|max:2000'
        ],
        []);

        if($validator ->passes()){
            $zone = new  \App\Models\Zona;
            $zone->coord_x = request("coord_x");
            $zone->coord_y = request("coord_y");
            $zone->nombre = request("nombre");
            $zone->imagen = request("imagen");
            $zone->descripcion = request("descripcion");
            $zone->up_door = request("up_door") ? 0 : 1;
            $zone->down_door = request("down_door") ? 0 : 1;
            $zone->left_door = request("left_door") ? 0 : 1;
            $zone->right_door = request( "right_door") ? 0 : 1;
            $zone->isSpawn = request("isSpawn") ? 1 : 0;
            $zone->save();
            return redirect("/map")->with("success",true);
        }else{
            return redirect("/map")->with("error","Es necesario nombre o descripcion");
        }
    }
    function delete(Request $request) {
        // borrar una entrada de la base de datos
        $zone = \App\Models\Zona::all()->where("coord_x", $request->coord_x)->where("coord_y", $request->coord_y)->first();
        $zone->delete();
        return redirect("/map")->with("success",true);
    }
    function update(Request $request){

        $data =[
            'nombre' => $request['nombre'],
            'descripcion' => $request['descripcion']
        ];

        $validator = Validator::make($data,
        [
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string|max:2000'
        ],
        []);

        if($validator ->passes()){
        // actualizar una entrada de la base de datos
        // dd($request);

        $zone = \App\Models\Zona::all()->where("coord_x", $request->coord_x)->where("coord_y", $request->coord_y)->first();
        $zone->coord_x = request("coord_x");
        $zone->coord_y = request("coord_y");
        $zone->nombre = request("nombre");
        $zone->imagen = request("imagen");
        $zone->descripcion = request("descripcion");
        $zone->up_door = request("up_door") ? 0 : 1;
        $zone->down_door = request("down_door") ? 0 : 1;
        $zone->left_door = request("left_door") ? 0 : 1;
        $zone->right_door = request("right_door") ? 0 : 1;
        $zone->isSpawn = request("isSpawn") ? 1 : 0;
        $zone->save();
        return redirect("/map")->with("success",true);
        }
        else{
            return redirect("/map")->with("error","Es necesario nombre o descripcion");
        }
        
        
    }

    public function mapInfo(){
        session_start();
        $personaje = \App\Models\Personaje::where("id", session("character")->id)->first();
        $zona = \App\Models\Zona::where("id", $personaje->zona_ID)->first();
    
        $zonaInfo = [
            "imagen" => $zona->imagen,
            'nombre' => $zona->nombre,
            'ruta_IMG' => $zona->ruta_IMG,
            'descripcion' => $zona->descripcion,
            'up_door' => $zona->hasUpDoor(),
            'down_door' => $zona->hasDownDoor(),
            'left_door' => $zona->hasLeftDoor(),
            'right_door' => $zona->hasRightDoor(),
            'coord_x' => $zona->coord_x,
            'coord_y' => $zona->coord_y,
            'isSpawn' => $zona->isSpawn
        ];
    
        // devolver por api la zona
        return response()->json($zonaInfo);
    }
}
