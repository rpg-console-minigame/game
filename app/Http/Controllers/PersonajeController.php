<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Zona;
use App\Models\Personaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersonajeController extends Controller
{
    // 'nombre',
    // 'HP',
    // 'Max_HP',
    // 'dinero',
    // 'users_ID',
    // 'zona_ID'
    public function create(Request $request)
    {
        session_start();
        
        $data = [
            'nombre' => $request['nombre'],
        ];
        
        $validator = Validator::make(
            $data,
            [
                'nombre' => 'required|string|max:100',
            ],
            []
        );
        
        $zona = Zona::where("id", $request->zona_ID)->first();

        if ($validator->passes() && 
        // comprobar que no haya un personaje con ese nombre
        Personaje::where("nombre", $request->nombre)->count()== 0 && 
        // comprobar que el usuario existe
        User::where("id", session()->get('user')['id'])->count()>0 && 
        // comprobar que el usuario no tiene más de 5 personajes
        Personaje::where("users_ID", session()->get('user')['id'])->count() < 5 && 
        // comprobar que la zona existe y es spawn
        $zona && $zona->isSpawn ) {

            $personaje = new Personaje();
            // comprobar que el nombre no está vacío y no exista un personaje con ese nombre
            $personaje->nombre = $request->nombre;
            $personaje->Max_HP =  env('Initial_Max_HP', 100);
            $personaje->HP = env('Initial_Max_HP', 100);
            $personaje->dinero = env('Initial_Dinero', 0);
            // para futuro: validar si el usuario existe y no tiene más de 5 personajes
            $personaje->users_ID = session()->get('user')['id'];
            // para futuro: validar si esa zona existe y es spawn
            $personaje->zona_ID = $request->zona_ID;
            $personaje->save();
            return redirect("/")->with("success", true);
        } else {
            return redirect("/")->with("error", "Es necesario nombre o descripcion");
        }
    }
    public function ifoApi(){
        $personaje = Personaje::where("id", session()->get("character")["id"])->first();
        return response()->json($personaje);
    }
    public function inputConsole(Request $request){
        // body: JSON.stringify({ direccion: input.toLowerCase() }),
        $input = $request->direccion;
        // if input is "derecha" or "izquierda" or "arriba" or "abajo"
        switch ($input) {
            case "abajo":
                $personaje = Personaje::where("id", session()->get("character")["id"])->first();
                $zona = Zona::where("id", $personaje->zona_ID)->first();
                $zona = Zona::where("coord_x", operator: $zona->coord_x+1)->where("coord_y", $zona->coord_y)->first();
                if($zona){
                    $personaje->zona_ID = $zona->id;
                    $personaje->save();
                    session("pesonaje", $personaje);
                    return response()->json("ok");
                }
                break;
            case "arriba":
                $personaje = Personaje::where("id", session()->get("character")["id"])->first();
                $zona = Zona::where("id", $personaje->zona_ID)->first();
                $zona = Zona::where("coord_x", $zona->coord_x-1)->where("coord_y", $zona->coord_y)->first();
                if($zona){
                    $personaje->zona_ID = $zona->id;
                    $personaje->save();
                    return response()->json("ok");
                }
                break;
            case "derecha":
                $personaje = Personaje::where("id", session()->get("character")["id"])->first();
                $zona = Zona::where("id", $personaje->zona_ID)->first();
                $zona = Zona::where("coord_x", $zona->coord_x)->where("coord_y", $zona->coord_y+1)->first();
                if($zona){
                    $personaje->zona_ID = $zona->id;
                    $personaje->save();
                    return response()->json("ok");
                }
                break;
            case "izquierda":
                $personaje = Personaje::where("id", session()->get("character")["id"])->first();
                $zona = Zona::where("id", $personaje->zona_ID)->first();
                $zona = Zona::where("coord_x", $zona->coord_x)->where("coord_y", $zona->coord_y-1)->first();
                if($zona){
                    $personaje->zona_ID = $zona->id;
                    $personaje->save();
                    return response()->json("ok");
                }
                break;
            default:
            return response()->json(data: "no existe sala");
                
        }
    }
}
