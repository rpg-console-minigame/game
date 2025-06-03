<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MapController extends Controller
{
    // Muestra la vista de login del editor de mapas
    public function showLogin(Request $request) {
        return view('loginMap');
    }

    // Procesa el login del editor de mapas
    public function processLogin(Request $request) {
        $name = $request->input('name');
        $password = $request->input('password');

        $user = \App\Models\adminUser::where("name", $name)->first();

        if ($user && Hash::check($password, $user->password)) {
            session(['is_admin' => true]);
            return redirect()->route('mapEditor'); // Redirige al dashboard
        } else {
            return redirect()->route('mapEditorLogin')->with("error", "Usuario o contraseña incorrectos");
        }
    }

    // Vista principal del editor de mapas (solo si logueado)
    public function dashboard() {
        if (!session('is_admin')) {
            return redirect()->route('mapEditorLogin')->with("error", "Debes iniciar sesión");
        }

        $map = \App\Models\Zona::all();
        $items = \App\Models\Objeto::all();
        return view("mapEditor", ["map" => $map, "items" => $items]);
    }

    // Crea una nueva zona del mapa
public function create(Request $request)
{
    if (!session('is_admin')) {
        return redirect()->route('mapEditorLogin');
    }

    // Validación inicial
    $validator = Validator::make($request->all(), [
        'nombre' => 'required|string|max:100',
        'descripcion' => 'required|string|max:2000',
        'coord_x' => 'required|integer',
        'coord_y' => 'required|integer',
    ]);

    if ($validator->fails()) {
        return redirect()->route('mapEditor')
                         ->with("error", "Todos los campos son requeridos y deben ser válidos.");
    }

    $coord_x = (int) $request->input("coord_x");
    $coord_y = (int) $request->input("coord_y");

    // Comprobamos si ya existe una casilla en esas coordenadas
    $existing = \App\Models\Zona::where('coord_x', $coord_x)
                                ->where('coord_y', $coord_y)
                                ->first();

    if ($existing) {
        return redirect()->route('mapEditor')
                         ->with("error", "Ya existe una casilla en las coordenadas ($coord_x, $coord_y).");
    }

    // Crear nueva casilla
    $zone = new \App\Models\Zona;
    $zone->coord_x = $coord_x;
    $zone->coord_y = $coord_y;
    $zone->nombre = $request->input("nombre");
    $zone->descripcion = $request->input("descripcion");
    $zone->imagen = $request->input("imagen");

    // Si el checkbox está marcado, significa que NO hay muro => puerta abierta (valor 0)
    $zone->up_door = $request->has("up_door") ? 0 : 1;
    $zone->down_door = $request->has("down_door") ? 0 : 1;
    $zone->left_door = $request->has("left_door") ? 0 : 1;
    $zone->right_door = $request->has("right_door") ? 0 : 1;
    $zone->isSpawn = $request->has("isSpawn") ? 1 : 0;

    $zone->save();

    // Redireccionar con mensaje y scroll opcional
    return redirect()->route('mapEditor')
                     ->with("success", "Casilla creada en ($coord_x, $coord_y).");
}


    // Elimina una zona del mapa
    public function delete(Request $request) {
        if (!session('is_admin')) {
            return redirect()->route('mapEditorLogin');
        }

        $zone = \App\Models\Zona::where("coord_x", $request->coord_x)
                                ->where("coord_y", $request->coord_y)
                                ->first();

        if ($zone) {
            $zone->delete();
            return redirect()->route('mapEditor')->with("success", true);
        } else {
            return redirect()->route('mapEditor')->with("error", "Zona no encontrada");
        }
    }

    // Actualiza una zona del mapa
    public function update(Request $request) {
        if (!session('is_admin')) {
            return redirect()->route('mapEditorLogin');
        }

        $data = [
            'nombre' => $request['nombre'],
            'descripcion' => $request['descripcion']
        ];

        $validator = Validator::make($data, [
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string|max:2000'
        ]);

        if ($validator->passes()) {
            $zone = \App\Models\Zona::where("coord_x", $request->coord_x)
                                    ->where("coord_y", $request->coord_y)
                                    ->first();

            if ($zone) {
                $zone->coord_x = $request->input("coord_x");
                $zone->coord_y = $request->input("coord_y");
                $zone->nombre = $request->input("nombre");
                $zone->imagen = $request->input("imagen");
                $zone->descripcion = $request->input("descripcion");
                $zone->up_door = $request->has("up_door") ? 0 : 1;
                $zone->down_door = $request->has("down_door") ? 0 : 1;
                $zone->left_door = $request->has("left_door") ? 0 : 1;
                $zone->right_door = $request->has("right_door") ? 0 : 1;
                $zone->isSpawn = $request->has("isSpawn") ? 1 : 0;
                $zone->save();
                return redirect()->route('mapEditor')->with("success", true);
            } else {
                return redirect()->route('mapEditor')->with("error", "Zona no encontrada");
            }
        } else {
            return redirect()->route('mapEditor')->with("error", "Es necesario nombre o descripción");
        }
    }

    // Devuelve información del mapa actual del personaje
    public function mapInfo() {
        session_start();
        $personaje = \App\Models\Personaje::where("id", session("character")->id)->first();
        $zona = \App\Models\Zona::where("id", $personaje->zona_ID)->first();
        $objetos = \App\Models\objetoInGame::where("zona_ID", $zona->id)->where("personaje_ID", null)->get();
        $inventario = \App\Models\objetoInGame::where("personaje_ID", $personaje->id)->get();
        $personajesInZona = \App\Models\Personaje::where("zona_ID", $zona->id)->get();
        $enemigosInZona = \App\Models\Enemigoingame::where("zona_ID", $zona->id)->get();

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
            'objetos' => $objetos,
            'inventario' => $inventario,
            'personajes' => $personajesInZona,
            'enemigos' => $enemigosInZona,

        ];

        return response()->json($zonaInfo);
    }
}
