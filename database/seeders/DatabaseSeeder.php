<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Zona;
use App\Models\adminUser;
use App\Models\TiendaOro;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // // Crear zonas
        // $contador = 0;
        // for ($x = 0; $x <= 2; $x++) {
        //     for ($y = 0; $y <= 2; $y++) {
        //         $contador++;
        //         Zona::factory()->create([
        //             'nombre' => 'Sala ' . $contador,
        //             'descripcion' => 'Sala ' . $contador,
        //             'imagen' => 'a',
        //             'down_door' => true,
        //             'left_door' => true,
        //             'right_door' => true,
        //             'up_door' => true,
        //             'coord_x' => $x,
        //             'coord_y' => $y,
        //         ]);
        //     }
        // }

        // // Crear adminUser con usuario y contraseña "admin"
        // adminUser::create([
        //     'name' => 'admin',
        //     'password' => Hash::make('admin'),
        // ]);

        // Insertar paquetes de oro
        TiendaOro::insert([
            [
                'nombre' => 'Paquete 1',
                'img_url' => 'https://via.placeholder.com/150?text=Paquete+1',
                'cantidad_oro' => 100,
                'precio' => 0.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Paquete 2',
                'img_url' => 'https://via.placeholder.com/150?text=Paquete+2',
                'cantidad_oro' => 250,
                'precio' => 2.49,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Paquete 3',
                'img_url' => 'https://via.placeholder.com/150?text=Paquete+3',
                'cantidad_oro' => 500,
                'precio' => 4.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
