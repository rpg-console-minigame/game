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
            $zone->ruta_IMG = request("ruta_IMG");
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
        // $zone->ruta_IMG = request("ruta_IMG");
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
        $zona = \App\Models\Zona::where("id",session("character")->zona_ID)->first();
        // devolver por api la zona
        return response()->json($zona);
    }
}
