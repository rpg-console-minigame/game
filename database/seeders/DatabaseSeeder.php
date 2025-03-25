<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Zona;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $contador = 0;
        for ($x = 0; $x <= 2; $x++) {
            for ($y = 0; $y <= 2; $y++) {
                $contador++;
                Zona::factory()->create([
                    'nombre' => 'Sala ' . $contador,
                    'descripcion' => 'Sala ' . $contador,
                    'imagen' => 'a',
                    'down_door' => true,
                    'left_door' => true,
                    'right_door' => true,
                    'up_door' => true,
                    'coord_x' => $x,
                    'coord_y' => $y,
                ]);
            }
        }
    }
}
