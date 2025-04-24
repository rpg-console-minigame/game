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
                        <div class="modal fade" id="modalEdit{{ $i }}-{{ $j }}" tabindex="-1"
                            role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form action="{{ route('update') }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h4 class="modal-title">Editar Casilla</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="nombre">Nombre</label>
                                                <input type="text" class="form-control form-control-lg"
                                                    name="nombre" placeholder="Nombre"
                                                    value="{{ $map->where('coord_x', $i)->where('coord_y', $j)->first()->nombre }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="descripcion">Descripción</label>
                                                <textarea class="form-control" name="descripcion" rows="3" placeholder="Descripción">{{ $map->where('coord_x', $i)->where('coord_y', $j)->first()->descripcion }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="descripcion">Imagen Ascii</label>
                                                <textarea class="form-control" name="imagen" rows="3" placeholder="Descripción">{{ $map->where('coord_x', $i)->where('coord_y', $j)->first()->imagen }}</textarea>
                                            </div>
                                            <fieldset class="border p-3">
                                                <legend class="w-auto">Muros</legend>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="up_door"
                                                        value="1" @if ($map->where('coord_x', $i)->where('coord_y', $j)->first()->up_door != 1) checked @endif>
                                                    <label class="form-check-label">Muro arriba</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="down_door"
                                                        value="1" @if ($map->where('coord_x', $i)->where('coord_y', $j)->first()->down_door != 1) checked @endif>
                                                    <label class="form-check-label">Muro abajo</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="left_door"
                                                        value="1" @if ($map->where('coord_x', $i)->where('coord_y', $j)->first()->left_door != 1) checked @endif>
                                                    <label class="form-check-label">Muro a la izquierda</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="right_door"
                                                        value="1" @if ($map->where('coord_x', $i)->where('coord_y', $j)->first()->right_door != 1) checked @endif>
                                                    <label class="form-check-label">Muro a la derecha</label>
                                                </div>
                                            </fieldset>
                                            <div class="form-check mt-3">
                                                <input class="form-check-input" type="checkbox" name="isSpawn"
                                                    value="1" @if ($map->where('coord_x', $i)->where('coord_y', $j)->first()->isSpawn == 1) checked @endif>
                                                <label class="form-check-label">¿Es Spawn?</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="coord_x" value="{{ $i }}">
                                            <input type="hidden" name="coord_y" value="{{ $j }}">
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                    </form>
                                    <form action="{{ route('delete') }}" method="POST" class="ml-2">
                                        @csrf
                                        <input type="hidden" name="coord_x" value="{{ $i }}">
                                        <input type="hidden" name="coord_y" value="{{ $j }}">
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
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
            <p type="button" data-toggle="modal"
                data-target="#modalCreate{{ $i }}-{{ $j }}">
                Create</p>
            <!-- The Modal -->
            <div class="modal fade" id="modalCreate{{ $i }}-{{ $j }}" tabindex="-1"
                role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="{{ route('create') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h4 class="modal-title">Crear Casilla</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control form-control-lg" name="nombre"
                                        placeholder="Nombre">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <textarea class="form-control" name="descripcion" rows="3" placeholder="Descripción"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Imagen Ascii</label>
                                    <textarea class="form-control" name="imagen" rows="3" placeholder=""></textarea>
                                </div>
                                <fieldset class="border p-3">
                                    <legend class="w-auto">Muros</legend>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="up_door"
                                            value="1">
                                        <label class="form-check-label">Muro arriba</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="down_door"
                                            value="1">
                                        <label class="form-check-label">Muro abajo</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="left_door"
                                            value="1">
                                        <label class="form-check-label">Muro a la izquierda</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="right_door"
                                            value="1">
                                        <label class="form-check-label">Muro a la derecha</label>
                                    </div>
                                </fieldset>
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" name="isSpawn" value="1">
                                    <label class="form-check-label">¿Es Spawn?</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="coord_x" value="{{ $i }}">
                                <input type="hidden" name="coord_y" value="{{ $j }}">
                                <button type="submit" class="btn btn-primary">Crear</button>
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
    {{-- div objects table --}}
    <div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    {{-- 'nombre',
                        'coste',
                        'function_name',
                        'durabilidad',
                        'zona_ID' --}}
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>function_name</th>
                    <th>Durabilidad</th>
                    <th>Zona_ID</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $object)
                    <tr>
                        <td>{{ $object->id }}</td>
                        <td>{{ $object->nombre }}</td>
                        <td>{{ $object->function_name }}</td>
                        <td>{{ $object->durabilidad }}</td>
                        <td>{{ $object->zona_ID }}</td>
                    </tr>
                @endforeach
            </tbody>
            {{-- boton crear objeto --}}
            <tfoot>
                <tr>
                    <td colspan="5">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modalCreateObject">Crear Objeto</button>
                    </td>
                </tr>
            </tfoot>
            {{-- modal  modalCreateObject--}}
            <div class="modal fade" id="modalCreateObject" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="{{route("createObject")}}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h4 class="modal-title">Crear Objeto</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control form-control-lg" name="nombre" placeholder="Nombre" required>
                                </div>
                                <div class="form-group">
                                    <label for="function_name">Function Name</label>
                                    <input type="text" class="form-control form-control-lg" name="function_name" placeholder="Function Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="durabilidad">Durabilidad</label>
                                    <input type="number" class="form-control form-control-lg" name="durabilidad" placeholder="Durabilidad" required>
                                </div>
                                <div class="form-group">
                                    <label for="durabilidad">Descripcion</label>
                                    <input type="text" class="form-control form-control-lg" name="descripcion" placeholder="Descripcion" required>
                                </div>
                                <div class="form-group">
                                    <label for="zona_ID">Zona ID</label>
                                    <select class="form-control form-control-lg" name="zona_ID" required>
                                        @foreach ($map as $zona)
                                            <option value="{{ $zona->id }}">{{ $zona->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Crear</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </table>
    </div>
</body>

</html>
