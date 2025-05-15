<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Zona;
use App\Models\adminUser;
use App\Models\TiendaOro;

class DatabaseSeeder extends Seeder
{
    // /**
    //  * Seed the application's database.
    //  *
    //  * @return void
    //  */
    // public function run()
    // {
    //     // Crear zonas
    //     $contador = 0;
    //     for ($x = 0; $x <= 2; $x++) {
    //         for ($y = 0; $y <= 2; $y++) {
    //             $contador++;
    //             Zona::factory()->create([
    //                 'nombre' => 'Sala ' . $contador,
    //                 'descripcion' => 'Sala ' . $contador,
    //                 'imagen' => 'a',
    //                 'down_door' => true,
    //                 'left_door' => true,
    //                 'right_door' => true,
    //                 'up_door' => true,
    //                 'coord_x' => $x,
    //                 'coord_y' => $y,
    //             ]);
    //         }
    //     }

    //     // Crear adminUser con usuario y contraseña "admin"
    //     adminUser::create([
    //         'name' => 'admin',
    //         'password' => Hash::make('admin'),
    //     ]);

        // Insertar paquetes de oro
        TiendaOro::create([
            ['nombre' => 'Paquete 1', 'img_url' => 'https://static.vecteezy.com/system/resources/previews/022/542/143/non_2x/pixel-art-game-currency-coin-vector.jpg', 'cantidad_oro' => 100, 'precio' => 0.99],
            ['nombre' => 'Paquete 2', 'img_url' => 'https://static.vecteezy.com/system/resources/previews/022/542/143/non_2x/pixel-art-game-currency-coin-vector.jpg', 'cantidad_oro' => 250, 'precio' => 2.49],
            ['nombre' => 'Paquete 3', 'img_url' => 'https://static.vecteezy.com/system/resources/previews/022/542/143/non_2x/pixel-art-game-currency-coin-vector.jpg', 'cantidad_oro' => 500, 'precio' => 4.99]
        ]);
    }
}

