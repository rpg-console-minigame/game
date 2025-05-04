<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class CopiarObjetos extends Command
{
    protected $signature = 'copiar:objetos';
    protected $description = 'Copia objetos desde la tabla objeto hacia objetoInGame según el campo minutos, si no hay una copia activa sin personaje.';

    public function handle()
    {
        Log::info('Comando copiar:objetos ejecutado a las ' . now());
        $objetos = DB::table('objeto')->get();

        foreach ($objetos as $objeto) {
            // Verifica si ya existe una copia sin personaje asignado
            $existeSinPersonaje = DB::table('objetoInGame')
                ->where('nombre', $objeto->nombre)
                ->where('zona_ID', $objeto->zona_ID)
                ->whereNull('personaje_ID')
                ->exists();

            if ($existeSinPersonaje) {
                continue; // No copiar si ya hay uno sin personaje
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
                DB::table('objetoInGame')->insert([
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

                $this->info("Copiado objeto '{$objeto->nombre}' a objetoInGame.");
            }
        }
    }
}
// Asegúrate de registrar este comando en el archivo app/Console/Kernel.php