<?php

namespace App\Http\Controllers;

use App\Models\Enemigoingame;
use App\Models\objetoInGame;
use App\Models\User;
use App\Models\Zona;
use App\Models\Personaje;
use App\Models\objetosInGame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersonajeController extends Controller
{
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

    public function delete(Request $request)
    {
        session_start();
        $personaje = Personaje::where("id", $request->id)->first();
        if ($personaje) {
            if ($personaje->users_ID == session()->get('user')['id']) {

                $personaje->objetosInGame()->delete();
                
                $personaje->delete();
                
                session()->put("character", $personaje);
               return redirect("/")->with("success", true);
            } else {
                return response()->json("no tienes permisos para eliminar este personaje", 501);
            }
        } else {
            return response()->json("no existe el personaje", 501);
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
                $zonanew = Zona::where("coord_x", $zona->coord_x + 1)->where("coord_y", $zona->coord_y)->first();

                if ($zonanew) {
                    // si hay enemigos en la zona
                    $enemigos = Enemigoingame::where("zona_ID", $zona->id)->get();
                    if ($enemigos->count() > 0) {
                        // quitar la vida al pj 
                        foreach ($enemigos as $enemigo) {
                            $personaje->HP -= $enemigo->ataque;
                            if ($personaje->HP <= 0) {
                                // si el personaje muere, eliminarlo y redirigir al spawn
                                $personaje->delete();
                                session()->forget("character");
                            }
                        }
                    }
                    $personaje->zona_ID = $zonanew->id;
                    $personaje->save();
                    session()->put("character", $personaje);
                    return response()->json("ok");
                } else {
                    // return response()->json("no hay zona hacia abajo"); json error
                    return response()->json("no hay zona hacia abajo", 501);
                }

            case "arriba":
                $zona = Zona::where("id", $personaje->zona_ID)->first();
                $zonanew = Zona::where("coord_x", $zona->coord_x - 1)->where("coord_y", $zona->coord_y)->first();

                if ($zonanew) {
                    // si hay enemigos en la zona
                    $enemigos = Enemigoingame::where("zona_ID", $zona->id)->get();
                    if ($enemigos->count() > 0) {
                        // quitar la vida al pj 
                        foreach ($enemigos as $enemigo) {
                            $personaje->HP -= $enemigo->ataque;
                            if ($personaje->HP <= 0) {
                                // si el personaje muere, eliminarlo y redirigir al spawn
                                $personaje->delete();
                                session()->forget("character");
                            }
                        }
                    }
                    $personaje->zona_ID = $zonanew->id;
                    $personaje->save();
                    session()->put("character", $personaje);
                    return response()->json("ok");
                } else {
                    return response()->json("no hay zona hacia arriba", 501);
                }

            case "derecha":
                $zona = Zona::where("id", $personaje->zona_ID)->first();
                $zonanew = Zona::where("coord_x", $zona->coord_x)->where("coord_y", $zona->coord_y + 1)->first();

                if ($zonanew) {
                    // si hay enemigos en la zona
                    $enemigos = Enemigoingame::where("zona_ID", $zona->id)->get();
                    if ($enemigos->count() > 0) {
                        // quitar la vida al pj 
                        foreach ($enemigos as $enemigo) {
                            $personaje->HP -= $enemigo->ataque;
                            if ($personaje->HP <= 0) {
                                // si el personaje muere, eliminarlo y redirigir al spawn
                                $personaje->delete();
                                session()->forget("character");
                            }
                        }
                    }
                    $personaje->zona_ID = $zonanew->id;
                    $personaje->save();
                    session()->put("character", $personaje);
                    return response()->json("ok");
                } else {
                    return response()->json("no hay zona hacia la derecha", 501);
                }

            case "izquierda":
                $zona = Zona::where("id", $personaje->zona_ID)->first();
                $zonanew = Zona::where("coord_x", $zona->coord_x)->where("coord_y", $zona->coord_y - 1)->first();

                if ($zonanew) {
                    // si hay enemigos en la zona
                    $enemigos = Enemigoingame::where("zona_ID", $zona->id)->get();
                    if ($enemigos->count() > 0) {
                        // quitar la vida al pj 
                        foreach ($enemigos as $enemigo) {
                            $personaje->HP -= $enemigo->ataque;
                            if ($personaje->HP <= 0) {
                                // si el personaje muere, eliminarlo y redirigir al spawn
                                $personaje->delete();
                                session()->forget("character");
                            }
                        }
                    }
                    $personaje->zona_ID = $zonanew->id;
                    $personaje->save();
                    session()->put("character", $personaje);
                    return response()->json("ok");
                } else {
                    return response()->json("no hay zona hacia la izquierda", 501);
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
                    return response()->json("no existe objeto en la sala", 501);
                }
            case "usar":
                // recibimos $request->objeto con el nombre del objeto, si existen 2, se usa el primero
                $objeto = objetoInGame::where("nombre", $request->objeto)
                    ->where("personaje_ID", session()->get("character")["id"])
                    ->first();
                if ($objeto) {
                    $this->use($objeto->function_name);
                    $objeto->durabilidad -= 1;
                    if ($objeto->durabilidad <= 0)$objeto->delete();
                    else  $objeto->save();
                    return response()->json("ok", 200);
                }
                else return response()->json("no existe objeto en el inventario", 501);
            default:
                return response()->json("Comando no reconocido", 501);
        }
    }
    function use($string){
        switch ($string) {
            case 'curar10':
                $this->curar(10);
                break;
            case 'curar20':
                $this->curar(20);
                break;
            case 'curar50':
                $this->curar(50);
                break;
            case 'bolsa10':
                $this->bolsa(10);
                break;
            case 'bolsa20':
                $this->bolsa(20);
                break;
            case 'bolsa50':
                $this->bolsa(50);
                break;
            case "piedraHogar":
                $this->piedraHogar();
                break;
            case "runaVida":
                $this->runaVida();
                break;
            case "CompasCaminantesPerdidos":
                $this->CompasCaminantesPerdidos();
                break;
            case "espada":
                $this->matar("Humanoide");
            default:
                return response()->json(['error' => 'Invalid object'], 400);
        }
    }
    function matar($tipo){
                $zona = Zona::where("id", session()->get("character")["zona_ID"])->first();
                $enemigo = Enemigoingame::where("zona_ID", $zona->id)
                    ->where("tipo", $tipo)
                    ->first();
                if ($enemigo) {
                    $enemigo->delete();
                    return response()->json("Enemigo eliminado", 200);
                } else {
                    return response()->json("Has golpeado el suelo", 501);
                }
    }
    function curar($data){
        session_start();
        $personaje = session('character');
        $personaje->HP += $data;
        if ($personaje->HP > $personaje->Max_HP) {
            $personaje->HP = $personaje->Max_HP;
        }
        $personaje->save();
    }
    function bolsa($data){
        session_start();
        $personaje = session('character');
        $personaje->dinero += $data;
        $personaje->save();
    }
    function piedraHogar(){
        session_start();
        $personaje = session('character');
        // buscar la zona de spawn
        $zona = Zona::where("isSpawn", 1)->first();
        if ($zona) {
            $personaje->zona_ID = $zona->id;
            $personaje->save();
            session()->put("character", $personaje);
            return response()->json("ok");
        } else {
            return response()->json("no hay zona de spawn", 501);
        }
    }
    function runaVida(){
        session_start();
        $personaje = session('character');
        $personaje->Max_HP ++;
        $personaje->save();
    }
}
