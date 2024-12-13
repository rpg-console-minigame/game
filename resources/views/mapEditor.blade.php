<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        overflow-x: hidden;
        /* Oculta el scroll horizontal */
    }

    .row {
        margin: 0;
        /* Elimina el margen lateral de .row que podría generar el scroll */
    }

    .col {
        padding: 0;
        /* Asegura que no haya espacios internos innecesarios */
    }
</style>

<body>
    <?php
    // saber cuál es la casilla más alejada de x=0 e y=0
    // se suma 1 para mostrar la opción de crear nueva casilla más alejada
    $max_x = $map->max('coord_x') + 1;
    $max_y = $map->max('coord_y') + 1;
    ?>
    @for ($i = 0; $i <= $max_x; $i++)
        <div class="row">
            @for ($j = 0; $j <= $max_y; $j++)
                @if ($map->where('coord_x', $i)->where('coord_y', $j)->count() == 1)
                    <div class="col"
                        style="height: 50px; width: 50px; background-color: red;
                    <?php
                    if ($map->where('coord_x', $i)->where('coord_y', $j)->first()->up_door == 0) {
                        echo 'border-top: 2px solid black;';
                    }
                    if ($map->where('coord_x', $i)->where('coord_y', $j)->first()->down_door == 0) {
                        echo 'border-bottom: 2px solid black;';
                    }
                    if ($map->where('coord_x', $i)->where('coord_y', $j)->first()->left_door == 0) {
                        echo 'border-left: 2px solid black;';
                    }
                    if ($map->where('coord_x', $i)->where('coord_y', $j)->first()->right_door == 0) {
                        echo 'border-right: 2px solid black;';
                    } ?>">
                        {{-- <a href="{{ route('delete', ['coord_x' => $i, 'coord_y' => $j]) }}">Edit</a> --}}
                        <p type="button" data-toggle="modal"
                            data-target="#modalEdit{{ $i }}-{{ $j }}">Edit</p>
                        <div class="modal" id="modalEdit{{ $i }}-{{ $j }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('update') }}" method="POST">
                                        @csrf
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Modal Heading</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <input type="text" name="nombre" placeholder="Nombre"
                                                value="{{ $map->where('coord_x', $i)->where('coord_y', $j)->first()->nombre }}">
                                            {{-- <input type="text" name="ruta_IMG" placeholder="Ruta IMG"> --}}
                                            <input type="text" name="descripcion" placeholder="Descripcion"
                                                value="{{ $map->where('coord_x', $i)->where('coord_y', $j)->first()->descripcion }}">
                                            <label for="up_door">¿Muro arriba?</label>
                                            <input type="checkbox" name="up_door" value="1"
                                                @if ($map->where('coord_x', $i)->where('coord_y', $j)->first()->up_door != 1) checked @endif>
                                            <label for="down_door">¿Muro abajo?</label>
                                            <input type="checkbox" name="down_door" value="1"
                                                @if ($map->where('coord_x', $i)->where('coord_y', $j)->first()->down_door != 1) checked @endif>
                                            <label for="left_door">¿Muro a la izquierda?</label>
                                            <input type="checkbox" name="left_door" value="1"
                                                @if ($map->where('coord_x', $i)->where('coord_y', $j)->first()->left_door != 1) checked @endif>
                                            <label for="right_door">¿Muro a la derecha?</label>
                                            <input type="checkbox" name="right_door" value="1"
                                                @if ($map->where('coord_x', $i)->where('coord_y', $j)->first()->right_door != 1) checked @endif>
                                            <label for="isSpawn">¿Es Spawn?</label>
                                            <input type="checkbox" name="isSpawn" value="1"
                                                @if ($map->where('coord_x', $i)->where('coord_y', $j)->first()->isSpawn == 1) checked @endif>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <input type="hidden" name="coord_x" value="{{ $i }}">
                                            <input type="hidden" name="coord_y" value="{{ $j }}">
                                            {{-- <a href="?coord_x={{$i}}&coord_y={{$j}}" class="btn btn-primary">Create</a> --}}
                                            <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                    <form action="{{ route('delete') }}" method="POST">
                                        <input type="hidden" name="coord_x" value="{{ $i }}">
                                        <input type="hidden" name="coord_y" value="{{ $j }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
        </div>
    @elseif (
        $map->where('coord_x', $i + 1)->where('coord_y', $j)->count() == 1 ||
            $map->where('coord_x', $i - 1)->where('coord_y', $j)->count() == 1 ||
            $map->where('coord_x', $i)->where('coord_y', $j + 1)->count() == 1 ||
            $map->where('coord_x', $i)->where('coord_y', $j - 1)->count() == 1)
        <div class="col" style="height: 50px; width: 50px; background-color: green;">
            {{-- <a href="{{ route('create', ['coord_x' => $i, 'coord_y' => $j]) }}">Create</a> --}}
            <p type="button" data-toggle="modal" data-target="#modalCreate{{ $i }}-{{ $j }}">
                Create</p>
            <!-- The Modal -->
            <div class="modal" id="modalCreate{{ $i }}-{{ $j }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('create') }}" method="POST">
                            @csrf
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Modal Heading</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <input type="text" name="nombre" placeholder="Nombre">
                                {{-- <input type="text" name="ruta_IMG" placeholder="Ruta IMG"> --}}
                                <input type="text" name="descripcion" placeholder="Descripcion">
                                <label for="up_door">¿Muro arriba?</label>
                                <input type="checkbox" name="up_door" value="1">
                                <label for="down_door">¿Muro abajo?</label>
                                <input type="checkbox" name="down_door" value="1">
                                <label for="left_door">¿Muro a la izquierda?</label>
                                <input type="checkbox" name="left_door" value="1">
                                <label for="right_door">¿Muro a la derecha?</label>
                                <input type="checkbox" name="right_door" value="1">
                                <label for="isSpawn">¿Es Spawn?</label>
                                <input type="checkbox" name="isSpawn" value="1">
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <input type="hidden" name="coord_x" value="{{ $i }}">
                                <input type="hidden" name="coord_y" value="{{ $j }}">
                                {{-- <a href="?coord_x={{$i}}&coord_y={{$j}}" class="btn btn-primary">Create</a> --}}
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col" style="height: 50px; width: 50px; background-color: blue;"></div>
    @endif
    @endfor
    </div>
    @endfor
</body>

</html>
