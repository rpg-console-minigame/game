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
}
