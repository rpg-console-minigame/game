<?php

namespace App\Http\Controllers;

use App\Models\objetoInGame;
use App\Models\User;
use App\Models\Zona;
use App\Models\Personaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersonajeController extends Controller
{
    public function create(Request $request)
    {

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

        if (
            $validator->passes() &&
            Personaje::where("nombre", $request->nombre)->count() == 0 &&
            User::where("id", session()->get('user')['id'])->count() > 0 &&
            Personaje::where("users_ID", session()->get('user')['id'])->count() < 5 &&
            $zona && $zona->isSpawn
        ) {
            $personaje = new Personaje();
            $personaje->nombre = $request->nombre;
            $personaje->Max_HP = env('Initial_Max_HP', 100);
            $personaje->HP = env('Initial_Max_HP', 100);
            $personaje->dinero = env('Initial_Dinero', 0);
            $personaje->users_ID = session()->get('user')['id'];
            $personaje->zona_ID = $request->zona_ID;
            $personaje->save();

            session()->put("character", $personaje);

            return redirect("/")->with("success", true);
        } else {
            return redirect("/")->with("error", "Es necesario nombre o descripción");
        }
    }

    public function ifoApi()
    {
        $personaje = Personaje::where("id", session()->get("character")["id"])->first();
        return response()->json($personaje);
    }

    public function inputConsole(Request $request)
    {
        $input = $request->input;
        $personaje = Personaje::where("id", session()->get("character")["id"])->first();

        switch ($input) {
            case "abajo":
                $zona = Zona::where("id", $personaje->zona_ID)->first();
                $zona = Zona::where("coord_x", $zona->coord_x + 1)->where("coord_y", $zona->coord_y)->first();

                if ($zona) {
                    $personaje->zona_ID = $zona->id;
                    $personaje->save();
                    session()->put("character", $personaje);
                    return response()->json("ok");
                } else {
                    return response()->json("no hay zona hacia abajo");
                }

            case "arriba":
                $zona = Zona::where("id", $personaje->zona_ID)->first();
                $zona = Zona::where("coord_x", $zona->coord_x - 1)->where("coord_y", $zona->coord_y)->first();

                if ($zona) {
                    $personaje->zona_ID = $zona->id;
                    $personaje->save();
                    session()->put("character", $personaje);
                    return response()->json("ok");
                } else {
                    return response()->json("no hay zona hacia arriba");
                }

            case "derecha":
                $zona = Zona::where("id", $personaje->zona_ID)->first();
                $zona = Zona::where("coord_x", $zona->coord_x)->where("coord_y", $zona->coord_y + 1)->first();

                if ($zona) {
                    $personaje->zona_ID = $zona->id;
                    $personaje->save();
                    session()->put("character", $personaje);
                    return response()->json("ok");
                } else {
                    return response()->json("no hay zona hacia la derecha");
                }

            case "izquierda":
                $zona = Zona::where("id", $personaje->zona_ID)->first();
                $zona = Zona::where("coord_x", $zona->coord_x)->where("coord_y", $zona->coord_y - 1)->first();

                if ($zona) {
                    $personaje->zona_ID = $zona->id;
                    $personaje->save();
                    session()->put("character", $personaje);
                    return response()->json("ok");
                } else {
                    return response()->json("no hay zona hacia la izquierda");
                }

            case "tomar":
                $objetoname = $request->objeto;
                $objeto = objetoInGame::where("nombre", $objetoname)
                    ->where("zona_ID", session()->get("character")["zona_ID"])
                    ->where("personaje_ID", null)
                    ->first();

                if ($objeto) {
                    $objeto->personaje_ID = $personaje->id;
                    $objeto->save();
                    session()->put("character", $personaje);
                    return response()->json("ok");
                } else {
                    return response()->json("no existe objeto en la sala");
                }

            default:
                return response()->json("Comando no reconocido");
        }
    }
}
