<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objeto;
use App\Models\Zona;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\EnemigoController;

class ObjetoController extends Controller
{
    function create(Request $request)
    {
        $objeto = new Objeto();
        $objeto->nombre = $request->input('nombre');
        $objeto->function_name = $request->input('function_name');
        $objeto->durabilidad = $request->input('durabilidad');
        $objeto->descripcion = $request->input('descripcion');
        $objeto->zona_ID = $request->input('zona_ID');
        $objeto->coste = $request->input('coste');
        $objeto->minutos = $request->input('minutos');
        $objeto->save();

        return redirect()->route('mapEditor')->with('success', 'Objeto creado exitosamente!');
    }

    function edit(Request $request, $id)
    {
        $objeto = Objeto::find($id);
        if ($objeto) {
            $objeto->nombre = $request->input('nombre');
            $objeto->function_name = $request->input('function_name');
            $objeto->durabilidad = $request->input('durabilidad');
            $objeto->descripcion = $request->input('descripcion');
            $objeto->coste = $request->input('coste');
            $objeto->minutos = $request->input('minutos');
            $objeto->zona_ID = $request->input('zona_ID');
            $objeto->save();

            return redirect()->route('mapEditor')->with('success', 'Objeto editado exitosamente!');
        } else {
            return redirect()->route('mapEditor')->with('error', 'Objeto no encontrado!');
        }
    }

    function delete(Request $request)
    {
        $id = $request->input('id');
        $objeto = Objeto::find($id);
        if ($objeto) {
            $objeto->delete();
            return redirect()->route('mapEditor')->with('success', 'Objeto eliminado exitosamente!');
        } else {
            return redirect()->route('mapEditor')->with('error', 'Objeto no encontrado!');
        }
    }

    public function copiarObjetos(Request $request)
    {
        $key = $request->header('X-CRON-KEY');

        if ($key !== env('CRON_SECRET')) {
            abort(403, 'Unauthorized');
        }

        Log::info('Comando copiar:objetos ejecutado a las ' . now());

        $objetos = DB::table('objeto')->get();

        foreach ($objetos as $objeto) {
            $existeSinPersonaje = DB::table('objetoingame')
                ->where('nombre', $objeto->nombre)
                ->where('zona_ID', $objeto->zona_ID)
                ->whereNull('personaje_ID')
                ->exists();

            if ($existeSinPersonaje) {
                continue;
            }

            $debeCopiarse = false;

            if (!$objeto->last_copied_at) {
                $debeCopiarse = true;
            } else {
                $ultimo = Carbon::parse($objeto->last_copied_at);
                if (now()->diffInMinutes($ultimo) >= $objeto->minutos) {
                    $debeCopiarse = true;
                }
            }

            if ($debeCopiarse) {
                DB::table('objetoingame')->insert([
                    'zona_ID' => $objeto->zona_ID,
                    'personaje_ID' => null,
                    'nombre' => $objeto->nombre,
                    'descripcion' => $objeto->descripcion,
                    'coste' => $objeto->coste,
                    'durabilidad' => $objeto->durabilidad,
                    'function_name' => $objeto->function_name,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                DB::table('objeto')->where('id', $objeto->id)->update([
                    'last_copied_at' => now()
                ]);
            }
        }
        $enemigoController = new EnemigoController();
        $enemigoController->copiarEnemigos();

        return response()->json(['status' => 'Schedule executed']);
    }
}
