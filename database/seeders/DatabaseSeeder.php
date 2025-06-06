<?php

namespace Database\Seeders;

use App\Models\Zona;
use App\Models\Objeto;
use App\Models\Tienda;
use App\Models\adminUser;
use App\Models\TiendaOro;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        Zona::factory()->create([
            'id' => 1,
            'nombre' => 'Bosque de los Susurros [1-1]',
            'imagen' => '----------------------------------------------------------------------------------
|                        ccee88oo                ccee88oo                        |
|                     C8O8O8Q8PoOb o8oo       C8O8O8Q8PoOb o8oo                  |
|                  dOB69QO8PdUOpugoO9bD    dOB69QO8PdUOpugoO9bD                  |
|                 CgggbU8OU qOp qOdoUOdcb   CgggbU8OU qOp qOdoUOdcb              |
|                     6OuU  /p u gcoUodpP    6OuU  /p u gcoUodpP                 |
|                       \\\//  /douUP          \\\//  /douUP                     |
|                         \\\////               \\\////                          |
|                          |||/                  |||/                            |
|                          |||                   |||                             |
|                          |||                   |||                             |
|                   , -=-~  .-^- _, -=-~  .-^- _, -=-~  .-^- _                   |
----------------------------------------------------------------------------------',
            'descripcion' => 'Adentrándote en el Bosque de los Susurros, el aire se vuelve espeso y silencioso...',
            'up_door' => true,
            'down_door' => true,
            'left_door' => true,
            'right_door' => true,
            'coord_x' => 0,
            'coord_y' => 0,
            'isSpawn' => true,
        ]);

        Zona::factory()->create([
            'id' => 2,
            'nombre' => 'Paso de las Agujas Dobles [2-1]',
            'imagen' => '----------------------------------------------------------------------------------
|                                                                                |
|                     /\            /\/\            /\                           |
|                    /  \          /    \          /  \                          |
|                   /    \  /\    /      \    /\  /    \                         |
|                  /      \/  \  /        \  /  \/      \                        |
|                 /            \/          \/            \                       |
|                /                                        \                      |
|               /                                          \                     |
|              /                                            \                    |
|             /                                              \                   |
|                                                                                |
----------------------------------------------------------------------------------',
            'descripcion' => 'Ubicado entre dos cadenas montañosas casi idénticas, el Paso de las Agujas Dobles...',
            'up_door' => true,
            'down_door' => true,
            'left_door' => true,
            'right_door' => true,
            'coord_x' => 0,
            'coord_y' => 1,
            'isSpawn' => false,
        ]);

        Zona::factory()->create([
            'id' => 3,
            'nombre' => 'Torres de la Niebla[3-1]',
            'imagen' => '----------------------------------------------------------------------------------
|                          |>>>                        |>>>                      |
|                          |                           |                         |
|                      _  _|_  _                   _  _|_  _                    |
|                     | |_| |_| |                 | |_| |_| |                   |
|                     \  .      /                 \  .      /                   |
|                      \   ,   /                   \   ,   /                    |
|                       | .-. |                     | .-. |                     |
|                       | | | |                     | | | |                     |
|                       | |_| |                     | |_| |                     |
|                       |     |                     |     |                     |
|                      /| | | |\                   /| | | |\                    |
|                     /_|_|_|_|_\                 /_|_|_|_|_\                   |
|                      |  | |  |                   |  | |  |                    |
|                    __|__|_|__|__               __|__|_|__|__                  |
|                   |             |             |             |                 |
|~~~~~~~~~~~~~~~~~~~|~~~~~~~~~~~~~|~~~~~~~~~~~~~|~~~~~~~~~~~~~|~~~~~~~~~~~~~~~~~|
|                   |             |             |             |                 |
----------------------------------------------------------------------------------',
            'descripcion' => 'En lo alto de un reino olvidado, dos castillos vigilan el paso de los siglos sobre un río encantado...',
            'up_door' => true,
            'down_door' => true,
            'left_door' => true,
            'right_door' => true,
            'coord_x' => 0,
            'coord_y' => 2,
            'isSpawn' => false,
        ]);

        Zona::factory()->create([
            'id' => 4,
            'nombre' => 'Claros del Vínculo Eterno [1-2]',
            'imagen' => <<<EOT
                '----------------------------------------------------------------------------------
                |                                 ,@@@@@@,                                       |
                |                        ,,,.   ,@@@@@@/@@,  .oo8888o.                           |
                |                    ,&%%&%&&%,@@@@@/@@@@@@,8888\\88/8o                          |
                |                    ,%&\\%&&%&&%,@@@\\@@@/@@@88\\88888/88                       |
                |                    %&&%&%&/%&&%@\\@@/ /@@@88888\\88888                         |
                |                    %&&%/ %&%%&&@@\\ V /@@' \`88\\8 88                          |
                |                     &%\\ \` /%&'  |.|       \\ '|8'                            |
                |                        |o|        | |         | |                              |
                |                        |.|        | |         | |                              |
                |                       \\ //_/,\\_//__\\__/   \\_//__/                          |
                |                    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^                           |
                ----------------------------------------------------------------------------------
            EOT,
            'descripcion' => 'Entre la niebla del bosque, se abre un claro donde tres árboles gigantescos se alzan...',
            'up_door' => true,
            'down_door' => true,
            'left_door' => true,
            'right_door' => true,
            'coord_x' => 1,
            'coord_y' => 0,
            'isSpawn' => false,
        ]);

        Zona::factory()->create([
            'id' => 5,
            'nombre' => 'Casa del Valle Silencioso [2-2]',
            'imagen' => '----------------------------------------------------------------------------------
|                                                                                |
|                                /＾＾＾＾＾＾\                                   |
|                              /    |    |    \                                  |
|                            /      |    |      \                                |
|                           /_______|____|_______\                               |
|                           |                    |                               |
|                           |  [□]    [□]        |                               |
|                           |       ___          |                               |
|                           |______|_"_|_________|                               |
|                                                                                |
----------------------------------------------------------------------------------',
            'descripcion' => 'Una acogedora y sencilla casa construida con madera firme y tejas antiguas...',
            'up_door' => true,
            'down_door' => true,
            'left_door' => true,
            'right_door' => true,
            'coord_x' => 1,
            'coord_y' => 1,
            'isSpawn' => false,
        ]);

        Zona::factory()->create([
            'id' => 6,
            'nombre' => 'El Santuario del Silencio [3-2]',
            'imagen' => <<<EOT
'----------------------------------------------------------------------------------
|              ,,                                         .-.                    |
|              || |   ,                                    ) )                   |
|              || |  | |                                  '-'                    |
|              || '--' |                                                         |
|        ,,    || .----'                                                         |
|       || |   || |                                                              |
|       |  '---'| |                                                              |
|       '------.| |                                  _____                       |
|       ((_))  || |      (  _                       / /|\ \                      |
|       (o o)  || |      ))("),                    | | | | |                     |
|    ____\_/___||_|_____((__^_))____________________\_\|/_/__ldb                 |
|________________________________________________________________________________|
EOT,
            'descripcion' => 'Un misterioso templo se alza solitario en la llanura, rodeado por un inquietante vacío...',
            'up_door' => true,
            'down_door' => true,
            'left_door' => true,
            'right_door' => true,
            'coord_x' => 1,
            'coord_y' => 2,
            'isSpawn' => false,
        ]);

        Zona::factory()->create([
            'id' => 7,
            'nombre' => 'Ruinas de Velmora [1-3]',
            'imagen' => '----------------------------------------------------------------------------------
|                        ccee88oo        ⢠⣤⣶⣶⣶⠋⠁                              |
|                     C8O8O8Q8PoOb o8oo  ⠙⠻⢿⣿⣿⣶⣶⣦⣤⣄                          |
|                  dOB69QO8PdUOpugoO9bD  ⣀⣤⣤⣤⣽⣿⣿⣿⣿⣿⡿⠇                       |
|                 CgggbU8OU qOp qOdoUOdcb⣿⣿⣿⣿⡿⠛⠛⠋⠉                           |
|                     6OuU  /p u gcoUodpP⢿⣿⣿⣷⣶⣶⣦⣤⣤⣄⡀  ⠀⠀⠀                   |
|                       \\\//  /douUP ⠛⠿⢶⣾⣿⣿⣿⣿⣿⣿⣿⣿⡿⣿⣷⠀                     |
|                         \\\////     ⢀⣀⣤⣾⣿⣿⢿⣿⣿⢟⣡⣼⣿⠟                       |
|                          |||/    ⣠⣶⣿⣿⣿⠟⣡⣾⣿⣿⣿⣿⡿⠋⠁                         |
|                          |||   ⢰⣿⣿⠹⣿⣿⣄⠻⣿⣿⣿⠻⣿⣿⣦⣄⣀⠀⠀                      |
|                          |||  ⢰⣿⣿⢰⣄⠹⣿⣿⢰⣄⠹⢰⣄⠹⣿⣿⣿⠟                        |
|                   , -=-~  .-^- _, -=-~  .-^- _, -=-~  .-^- _                   |
----------------------------------------------------------------------------------',
            'descripcion' => 'A medida que atraviesas la espesura del bosque, la naturaleza comienza a mezclarse...',
            'up_door' => true,
            'down_door' => true,
            'left_door' => true,
            'right_door' => true,
            'coord_x' => 2,
            'coord_y' => 0,
            'isSpawn' => false,
        ]);

        Zona::factory()->create([
            'id' => 8,
            'nombre' => 'Selva Esmeralda [2-3]',
            'imagen' => '----------------------------------------------------------------------------------
|                                                                                |
|      &&&     &&&    &&&      &&&     &&&    &&&     &&&      &&&    &&&        |
|     &&&&&   &&&&&  &&&&&    &&&&&   &&&&&  &&&&&   &&&&&    &&&&&  &&&&&       |
|    &&&&&&& &&&&&&&&&&&&&&  &&&&&&& &&&&&&&&&&&&&& &&&&&&&  &&&&&&&&&&&&&&      |
|      |||     |||    |||      |||     |||    |||     |||      |||    |||        |
|      |||     |||    |||      |||     |||    |||     |||      |||    |||        |
|      |||     |||    |||      |||     |||    |||     |||      |||    |||        |
|                                                                                |
|                                                                                |
|________________________________________________________________________________|',
            'descripcion' => 'Un denso y vibrante bosque tropical donde la luz del sol apenas logra atravesar...',
            'up_door' => true,
            'down_door' => true,
            'left_door' => true,
            'right_door' => true,
            'coord_x' => 2,
            'coord_y' => 1,
            'isSpawn' => false,
        ]);

        Zona::factory()->create([
            'id' => 9,
            'nombre' => 'Atardecer en la Costa de los Ecos [3-3]',
            'imagen' => <<<EOT
'----------------------------------------------------------------------------------
|                                                                                |
|                                                                                |
|                                                    |                           |
|                                                  \ _ /                         |
|                                                -= (_) =-                       |
|               .\/.                               /   \                         |
|            .\\//o\\                      ,\/.      |              ,~           |
|            //o\\|,\/.   ,.,.,   ,\/.  ,\//o\\                     |\           |
|              |  |//o\  /###/#\  //o\  /o\\|                      /| \          |
|            ^^|^^|^~|^^^|' '|:|^^^|^^^^^|^^|^^^""""""""("~~~~~~~~/_|__\~~~~~~~~~|
|             .|'' . |  '''""'"''. |`===`|''  '"" "" " (" ~~~~ ~ ~======~~  ~~ ~ |
|             jgs^^   ^^^ ^ ^^^ ^^^^ ^^^ ^^ ^^ "" """( " ~~~~~~ ~~~~~  ~~~ ~     |
|                                                                                |
|________________________________________________________________________________|'
EOT,
            'descripcion' => 'Las olas rompen suavemente en la orilla mientras el sol se desploma en el horizonte...',
            'up_door' => true,
            'down_door' => true,
            'left_door' => true,
            'right_door' => true,
            'coord_x' => 2,
            'coord_y' => 2,
            'isSpawn' => false,
        ]);


        // Crear ítems
        $items = [
            [
                'zona_ID' => 1,
                'nombre' => 'Pocion pequeña',
                'descripcion' => 'cura 10 de vida al usarla, un solo uso',
                'coste' => 10,
                'durabilidad' => 1,
                'function_name' => 'curar10',
                'minutos' => 5,
            ],
            [
                'zona_ID' => 2,
                'nombre' => 'Pocion mediana',
                'descripcion' => 'cura 20 de vida al usarla, un solo uso',
                'coste' => 20,
                'durabilidad' => 1,
                'function_name' => 'curar20',
                'minutos' => 5,
            ],
            [
                'zona_ID' => 3,
                'nombre' => 'Pocion grande',
                'descripcion' => 'cura 50 de vida al usarla, un solo uso',
                'coste' => 50,
                'durabilidad' => 1,
                'function_name' => 'curar50',
                'minutos' => 5,
            ],
            [
                'zona_ID' => 4,
                'nombre' => 'Bolsa de oro pequeña',
                'descripcion' => 'Otorga al portador 10 monedas al abrirla',
                'coste' => 10,
                'durabilidad' => 1,
                'function_name' => 'bolsa10',
                'minutos' => 5,
            ],
            [
                'zona_ID' => 5,
                'nombre' => 'Bolsa de oro mediana',
                'descripcion' => 'Otorga al portador 20 monedas al abrirla',
                'coste' => 20,
                'durabilidad' => 1,
                'function_name' => 'bolsa20',
                'minutos' => 5,
            ],
            [
                'zona_ID' => 6,
                'nombre' => 'Bolsa de oro grande',
                'descripcion' => 'Otorga al portador 50 monedas al abrirla',
                'coste' => 50,
                'durabilidad' => 1,
                'function_name' => 'bolsa50',
                'minutos' => 5,
            ],
            [
                'zona_ID' => 7,
                'nombre' => 'Piedra de Hogar',
                'descripcion' => 'Teletransporta al portador a la zona de inicio',
                'coste' => 100,
                'durabilidad' => 10,
                'function_name' => 'piedraHogar',
                'minutos' => 5,
            ],
            [
                'zona_ID' => 8,
                'nombre' => 'Runa de vida',
                'descripcion' => 'Añade 1 punto de vida máxima',
                'coste' => 500,
                'durabilidad' => 1,
                'function_name' => 'runaVida',
                'minutos' => 5,
            ],
        ];

        foreach ($items as $item) {
            Objeto::factory()->create($item);
        }


        // Crear adminUser con usuario y contraseña "admin"
        adminUser::create([
            'name' => 'admin',
            'password' => Hash::make('admin'),
        ]);

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

        Tienda::insert([
            [
                'nombre' => 'Espada de Hierro',
                'descripcion' => 'Una espada resistente hecha de hierro. Ideal para combates básicos.',
                'precio_oro' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Escudo de Roble',
                'descripcion' => 'Un escudo robusto tallado en madera de roble. Aumenta la defensa.',
                'precio_oro' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Poción de Vida',
                'descripcion' => 'Restaura 50 puntos de salud. De un solo uso.',
                'precio_oro' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Armadura de Cuero',
                'descripcion' => 'Ligera pero efectiva. Ofrece protección básica.',
                'precio_oro' => 200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Anillo de Agilidad',
                'descripcion' => 'Incrementa la velocidad del jugador durante 5 minutos.',
                'precio_oro' => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Botas de Aceleración',
                'descripcion' => 'Permiten moverse más rápido por el mapa.',
                'precio_oro' => 180,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
