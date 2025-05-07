<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MapController extends Controller
{
    function index() {
        $map = \App\Models\Zona::all();
        $items = \App\Models\Objeto::all();
        return view("mapEditor", ["map" => $map, "items" => $items]);
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

    // public function mapInfo(){
    //     session_start();
    //     $personaje = \App\Models\Personaje::where("id", session("character")->id)->first();
    //     $zona = \App\Models\Zona::where("id", $personaje->zona_ID)->first();
    //     $objetos = \App\Models\objetoInGame::where("zona_ID", $zona->id)->where("personaje_ID", null)->get();
    //     $zonaInfo = [
    //         "imagen" => $zona->imagen,
    //         'nombre' => $zona->nombre,
    //         'ruta_IMG' => $zona->ruta_IMG,
    //         'descripcion' => $zona->descripcion,
    //         'up_door' => $zona->hasUpDoor(),
    //         'down_door' => $zona->hasDownDoor(),
    //         'left_door' => $zona->hasLeftDoor(),
    //         'right_door' => $zona->hasRightDoor(),
    //         'coord_x' => $zona->coord_x,
    //         'coord_y' => $zona->coord_y,
    //         'isSpawn' => $zona->isSpawn,
    //         'objetos' => $objetos
    //     ];
    
    //     // devolver por api la zona
    //     return response()->json($zonaInfo);
    // }

    public function mapInfo() {
        session_start();
    
        if (!session()->has("character")) {
            return response()->json([
                "error" => "No hay personaje en sesión"
            ], 401);
        }
    
        $personaje = \App\Models\Personaje::find(session("character")->id);
    
        if (!$personaje) {
            return response()->json([
                "error" => "Personaje no encontrado"
            ], 404);
        }
    
        $zona = \App\Models\Zona::find($personaje->zona_ID);
    
        if (!$zona) {
            return response()->json([
                "error" => "Zona no encontrada"
            ], 404);
        }
    
        $objetos = \App\Models\objetoInGame::where("zona_ID", $zona->id)
            ->whereNull("personaje_ID")
            ->get();
    
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
            'isSpawn' => $zona->isSpawn,
            'objetos' => $objetos
        ];
    
        return response()->json($zonaInfo);
    }
    
}
