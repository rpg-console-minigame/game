<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Enemigoingame;
use App\Models\Enemigo;
use Carbon\Carbon;

class EnemigoController extends Controller
{
    public function copiarEnemigos(){
        Log::info('Comando copiar:enemigos ejecutado a las ' . now());

    $enemigos = Enemigo::all();
    if ($enemigos->isEmpty()) {
        Log::info('No hay enemigos para copiar.');
        return;
    }

    foreach ($enemigos as $enemigo) {
        
    Log::info('Comando copiar:enemigos ejecutado a las ' . now());

    $enemigos = Enemigo::all();

    foreach ($enemigos as $enemigo) {
        $existeSinPersonaje = Enemigoingame::where('nombre', $enemigo->nombre)
            ->where('zona_ID', $enemigo->zona_ID)
            ->exists();

        if ($existeSinPersonaje) {
            continue;
        }

        $debeCopiarse = false;

        if (!$enemigo->last_copied_at) {
            $debeCopiarse = true;
        } else {
            $ultimo = Carbon::parse($enemigo->last_copied_at);
            if (now()->diffInMinutes($ultimo) >= $enemigo->minutos) {
                $debeCopiarse = true;
            }
        }

        if ($debeCopiarse) {
            Enemigoingame::create([
                'nombre' => $enemigo->nombre,
                'tipo' => $enemigo->tipo,
                'descripcion' => $enemigo->descripcion,
                'ataque' => $enemigo->ataque,
                '%soltar' => $enemigo->{'%soltar'},
                'objeto_ID' => $enemigo->objeto_ID,
                'zona_ID' => $enemigo->zona_ID,
            ]);

            $enemigo->update([
                'last_copied_at' => now()
            ]);
        }
    }
    }
    }

    public function create(Request $request)
    {
        // Validación (puedes descomentar si lo necesitas)
        // $request->validate([
        //     'nombre' => 'required|string|max:255',
        //     'tipo' => 'required|string|max:100',
        //     'descripcion' => 'required|string',
        //     'ataque' => 'required|integer|min:0',
        //     '%soltar' => 'required|numeric|min:0|max:100',
        //     'objeto_ID' => 'required|integer',
        //     'zona_ID' => 'required|integer',
        //     'minutos' => 'required|integer|min:0',
        // ]);

        // Crear nuevo enemigo
        $enemigo = new Enemigo();
        $enemigo->nombre = $request->input('nombre');
        $enemigo->tipo = $request->input('tipo');
        $enemigo->descripcion = $request->input('descripcion');
        $enemigo->ataque = $request->input('ataque');
        $enemigo->{'%soltar'} = $request->input('%soltar');
        $enemigo->objeto_ID = $request->input('objeto_ID');
        $enemigo->zona_ID = $request->input('zona_ID');
        $enemigo->minutos = $request->input('minutos');

        $enemigo->save();

        return redirect()->back()->with('success', 'Enemigo creado correctamente.');
    }

    public function delete(Request $request)
    {
        // Validación (puedes descomentar si lo necesitas)
        // $request->validate([
        //     'id' => 'required|integer|exists:enemigos,id',
        // ]);

        // Eliminar enemigo
        $enemigo = Enemigo::findOrFail($request->input('id'));
        $enemigo->delete();

        return redirect()->back()->with('success', 'Enemigo eliminado correctamente.');
    }

    public function update(Request $request)
    {
        // Validación (puedes descomentar si lo necesitas)
        // $request->validate([
        //     'id' => 'required|integer|exists:enemigos,id',
        //     'nombre' => 'required|string|max:255',
        //     'tipo' => 'required|string|max:100',
        //     'descripcion' => 'required|string',
        //     'ataque' => 'required|integer|min:0',
        //     '%soltar' => 'required|numeric|min:0|max:100',
        //     'objeto_ID' => 'required|integer',
        //     'zona_ID' => 'required|integer',
        //     'minutos' => 'required|integer|min:0',
        // ]);

        // Actualizar enemigo
        $enemigo = Enemigo::findOrFail($request->input('id'));
        $enemigo->nombre = $request->input('nombre');
        $enemigo->tipo = $request->input('tipo');
        $enemigo->descripcion = $request->input('descripcion');
        $enemigo->ataque = $request->input('ataque');
        $enemigo->{'%soltar'} = $request->input('%soltar');
        $enemigo->objeto_ID = $request->input('objeto_ID');
        $enemigo->zona_ID = $request->input('zona_ID');
        $enemigo->minutos = $request->input('minutos');

        $enemigo->save();

        return redirect()->back()->with('success', 'Enemigo actualizado correctamente.');
    }


    
    
}
