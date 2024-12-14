<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personaje;

class PersonajeController extends Controller
{
    // 'nombre',
    // 'HP',
    // 'Max_HP',
    // 'dinero',
    // 'users_ID',
    // 'zona_ID'
    public function create(Request $request){
        session_start();
        $personaje = new Personaje();
        // comprobar que el nombre no está vacío y no exista un personaje con ese nombre
        $personaje->nombre = $request->nombre;
        $personaje->Max_HP =  env ('Initial_Max_HP', 100);
        $personaje->HP = env ('Initial_Max_HP', 100);
        $personaje->dinero = env ('Initial_Dinero', 0);
        // para futuro: validar si el usuario existe y no tiene más de 5 personajes
        $personaje->users_ID = $_SESSION['user']->id;
        // para futuro: validar si esa zona existe y es spawn
        $personaje->zona_ID = $request->zona_ID;
        $personaje->save();
        return response()->json($personaje);
    }
}
