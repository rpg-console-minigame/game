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
        background-color: #333;
        font-family: 'Segoe UI', sans-serif;
        color: #ddd;
    }

    .table {
        background-color: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        margin: 60px 0;
    }

    .table th {
        background-color: #1e1e1e;
        color: white;
        text-align: center;
    }

    .table td {
        text-align: center;
        vertical-align: middle;
    }

    .btn {
        border-radius: 30px;
        padding: 8px 18px;
        font-weight: 500;
    }

    .btn i {
        margin-right: 5px;
    }

    .btnDark {
        background: lightgreen;
        border: none;
    }

    .btn-danger {
        background: linear-gradient(to right, #e74c3c, #c0392b);
        border: none;
    }

    .btn-secondary {
        background: linear-gradient(to right, #95a5a6, #7f8c8d);
        border: none;
    }

    .modal-content {
        background: rgb(207, 207, 207);
        backdrop-filter: blur(10px);
        border-radius: 1.2rem;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        color: #1e1e1e
    }

    .modal-header {
        background: #1e1e1e;
        color: white;
        border-top-left-radius: 1.2rem;
        border-top-right-radius: 1.2rem;
    }

    .form-control {
        border-radius: 0.5rem;
        border: 1px solid #ced4da;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .modal-title {
        font-weight: bold;
    }

    tfoot td {
        text-align: center;
        padding-top: 1rem;
    }

    .card-form {
        background: white;
        border-radius: 1rem;
        padding: 1rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .form-group label {
        font-weight: 600;
    }

    .btn:hover {
        opacity: 0.9;
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
                        <!-- The Modal -->
                        <!-- Modal -->
                        <div class="modal fade" id="modalEdit{{ $i }}-{{ $j }}" tabindex="-1"
                            role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">

                                    <!-- Formulario de actualización -->
                                    <form action="{{ route('update') }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h4 class="modal-title">Editar Casilla</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <div class="modal-body">
                                            @php
                                                $casilla = $map->where('coord_x', $i)->where('coord_y', $j)->first();
                                            @endphp

                                            <div class="form-group">
                                                <label for="nombre">Nombre</label>
                                                <input type="text" class="form-control" name="nombre"
                                                    placeholder="Nombre" value="{{ $casilla->nombre }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="descripcion">Descripción</label>
                                                <textarea class="form-control" name="descripcion" rows="3">{{ $casilla->descripcion }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="imagen">Imagen ASCII</label>
                                                <textarea class="form-control" name="imagen" rows="3">{{ $casilla->imagen }}</textarea>
                                            </div>

                                            <fieldset class="border p-3 mb-3">
                                                <legend class="w-auto">Muros</legend>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="up_door"
                                                        value="1" @if ($casilla->up_door != 1) checked @endif>
                                                    <label class="form-check-label">Muro arriba</label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="down_door"
                                                        value="1" @if ($casilla->down_door != 1) checked @endif>
                                                    <label class="form-check-label">Muro abajo</label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="left_door"
                                                        value="1" @if ($casilla->left_door != 1) checked @endif>
                                                    <label class="form-check-label">Muro a la izquierda</label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="right_door"
                                                        value="1" @if ($casilla->right_door != 1) checked @endif>
                                                    <label class="form-check-label">Muro a la derecha</label>
                                                </div>
                                            </fieldset>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="isSpawn"
                                                    value="1" @if ($casilla->isSpawn == 1) checked @endif>
                                                <label class="form-check-label">¿Es Spawn?</label>
                                            </div>

                                            <input type="hidden" name="coord_x" value="{{ $i }}">
                                            <input type="hidden" name="coord_y" value="{{ $j }}">
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                        </div>
                                    </form>

                                    <!-- Formulario de eliminación -->
                                    <form action="{{ route('delete') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="coord_x" value="{{ $i }}">
                                        <input type="hidden" name="coord_y" value="{{ $j }}">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </div>
                                    </form>

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
                        <div class="modal fade" id="modalCreate{{ $i }}-{{ $j }}"
                            tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form action="{{ route('create') }}" method="POST">
                                        @csrf
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Crear Casilla</h4>
                                            <button type="button" class="close"
                                                data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="nombre">Nombre</label>
                                                <input type="text" class="form-control" name="nombre"
                                                    placeholder="Nombre">
                                            </div>

                                            <div class="form-group">
                                                <label for="descripcion">Descripción</label>
                                                <input type="text" class="form-control" name="descripcion"
                                                    placeholder="Descripción">
                                            </div>

                                            <div class="form-group">
                                                <label for="descripcion">Imagen ASCII</label>
                                                <textarea class="form-control" name="imagen" rows="3" placeholder=""></textarea>
                                            </div>

                                            <fieldset class="border p-3 mb-3">
                                                <legend class="w-auto">Muros</legend>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="up_door"
                                                        value="1">
                                                    <label class="form-check-label" for="up_door">¿Muro
                                                        arriba?</label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="down_door"
                                                        value="1">
                                                    <label class="form-check-label" for="down_door">¿Muro
                                                        abajo?</label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="left_door"
                                                        value="1">
                                                    <label class="form-check-label" for="left_door">¿Muro a la
                                                        izquierda?</label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="right_door"
                                                        value="1">
                                                    <label class="form-check-label" for="right_door">¿Muro a la
                                                        derecha?</label>
                                                </div>
                                            </fieldset>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="isSpawn"
                                                    value="1">
                                                <label class="form-check-label" for="isSpawn">¿Es Spawn?</label>
                                            </div>
                                        </div>

                                        <!-- Modal footer -->
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
                    <th>Minutos</th>
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
                        <td>{{ $object->minutos }}</td>
                        {{-- boton editar objeto --}}
                        <td><button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modalEditObject{{ $object->id }}">Editar
                                <i class="fas fa-edit"></i>
                            </button></td>
                        {{-- modal  modalEditObject --}}
                        <div class="modal fade" id="modalEditObject{{ $object->id }}" tabindex="-1"
                            role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form action="{{ route('editObject', ['id' => $object->id]) }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h4 class="modal-title">Editar Objeto</h4>
                                            <button type="button" class="close"
                                                data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="nombre">Nombre</label>
                                                <input type="text" class="form-control form-control-lg"
                                                    name="nombre" placeholder="Nombre"
                                                    value="{{ $object->nombre }}">
                                            </div>
                                            <div class="form-group ">
                                                <label for="function_name">Function Name</label>
                                                <input type="text" class="form-control form-control-lg"
                                                    name="function_name" placeholder="Function Name"
                                                    value="{{ $object->function_name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="durabilidad">Durabilidad</label>
                                                <input type="number" class="form-control form-control-lg"
                                                    name="durabilidad" placeholder="Durabilidad"
                                                    value="{{ $object->durabilidad }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="coste">Coste</label>
                                                <input type="number" class="form-control form-control-lg"
                                                    name="coste" placeholder="Coste" value="{{ $object->coste }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="durabilidad">Descripcion</label>
                                                <input type="text" class="form-control form-control-lg"
                                                    name="descripcion" placeholder="Descripcion"
                                                    value="{{ $object->descripcion }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="durabilidad">Minutos</label>
                                                <input type="text" class="form-control form-control-lg"
                                                    name="minutos" placeholder="Minutos"
                                                    value="{{ $object->minutos }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="zona_ID">Zona ID</label>
                                                <select class="form-control form-control-lg" name="zona_ID">
                                                    @foreach ($map as $zona)
                                                        <option value="{{ $zona->id }}"
                                                            @if ($object->zona_ID == $zona->id) selected @endif>
                                                            {{ $zona->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="id" value="{{ $object->id }}">
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancelar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- boton eliminar objeto --}}
                        <td><button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#modalDeleteObject{{ $object->id }}">Eliminar
                                <i class="fas fa-trash-alt"></i>
                            </button></td>
                        {{-- modal  modalDeleteObject --}}
                        <div class="modal fade" id="modalDeleteObject{{ $object->id }}" tabindex="-1"
                            role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form action="{{ route('deleteObject') }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h4 class="modal-title">Eliminar Objeto</h4>
                                            <button type="button" class="close"
                                                data-dismiss="modal">&times;</button>
                                        </div>
                                        <div
                                            class="modal-body
                                            <p>¿Estás seguro de que quieres eliminar el objeto
                                                {{ $object->nombre }}?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="id" value="{{ $object->id }}">
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancelar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach
            </tbody>
            {{-- boton crear objeto --}}
            <tfoot>
                <tr>
                    <td colspan="5">
                        <button type="button" class="btn btnDark text-dark" data-toggle="modal"
                            data-target="#modalCreateObject">Crear Objeto
                            <i class="fas fa-plus-circle"></i>
                        </button>
                    </td>
                </tr>
            </tfoot>
            {{-- modal  modalCreateObject --}}
            <div class="modal fade" id="modalCreateObject" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="{{ route('createObject') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h4 class="modal-title">Crear Objeto</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                {{-- $table->id();
            $table->unsignedBigInteger('zona_ID');
            $table->foreign('zona_ID')->references('id')->on('zona');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->integer('coste' )->nullable();
            $table->integer('durabilidad')->nullable();
            $table->string('function_name'); --}}
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control form-control-lg" name="nombre"
                                        placeholder="Nombre" required>
                                </div>
                                <div class="form-group">
                                    <label for="function_name">Function Name</label>
                                    <input type="text" class="form-control form-control-lg" name="function_name"
                                        placeholder="Function Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="durabilidad">Durabilidad</label>
                                    <input type="number" class="form-control form-control-lg" name="durabilidad"
                                        placeholder="Durabilidad" required>
                                </div>
                                <div class="form-group">
                                    <label for="coste">Coste</label>
                                    <input type="number" class="form-control form-control-lg" name="coste"
                                        placeholder="Coste" required>
                                </div>
                                <div class="form-group">
                                    <label for="durabilidad">Descripcion</label>
                                    <input type="text" class="form-control form-control-lg" name="descripcion"
                                        placeholder="Descripcion" required>
                                </div>
                                <div class="form-group">
                                    <label for="durabilidad">Minutos</label>
                                    <input type="text" class="form-control form-control-lg" name="minutos"
                                        placeholder="Minutos" required>
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
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </table>
    </div>

    {{-- TABLA ENEMIGOS --}}

    <div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Ataque</th>
                    <th>%Soltar</th>
                    <th>Objeto_id</th>
                    <th>Zona_ID</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($enemigos as $enemigo)
                    <tr>
                        <td>{{ $enemigo->id }}</td>
                        <td>{{ $enemigo->nombre }}</td>
                        <td>{{ $enemigo->ataque }}</td>
                        <td>{{ $enemigo->$soltar }}</td>
                        <td>{{ $enemigo->objeto_id }}</td>
                        <td>{{ $enemigo->zona_ID }}</td>

                        {{-- MODAL EDITAR ENEMIGO --}}
                        <td><button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modalEditEnemigo{{ $enemigo->id }}">Editar
                                <i class="fas fa-edit"></i>
                            </button></td>

                        <div class="modal fade" id="modalEditEnemigo{{ $enemigo->id }}" tabindex="-1"
                            role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    {{-- CAMBIAR RUTA EDITAR ENEMIGO --}}
                                    <form action="{{ route('editObject', ['id' => $enemigo->id]) }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h4 class="modal-title">Editar Enemigo</h4>
                                            <button type="button" class="close"
                                                data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="nombre">Nombre</label>
                                                <input type="text" class="form-control form-control-lg"
                                                    name="nombre" placeholder="Nombre"
                                                    value="{{ $enemigo->nombre }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="ataque">Ataque</label>
                                                <input type="number" class="form-control form-control-lg"
                                                    name="ataque" placeholder="0" value="{{ $enemigo->ataque }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="$soltar">$Soltar</label>
                                                <input type="number" class="form-control form-control-lg"
                                                    name="$soltar" placeholder="0" value="{{ $enemigo->$soltar }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="objeto_id">Objeto_id</label>
                                                <input type="number" class="form-control form-control-lg"
                                                    name="objeto_id" placeholder="0"
                                                    value="{{ $enemigo->$objeto_id }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="zona_ID">Zona ID</label>
                                                <select class="form-control form-control-lg" name="zona_ID">
                                                    @foreach ($map as $zona)
                                                        <option value="{{ $zona->id }}"
                                                            @if ($enemigo->zona_ID == $zona->id) selected @endif>
                                                            {{ $zona->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="id" value="{{ $enemigo->id }}">
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancelar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- BOTON DELETE ENEMIGO --}}
                        <td><button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#modalDeleteEnemigo{{ $enemigo->id }}">Eliminar
                                <i class="fas fa-trash-alt"></i>
                            </button></td>

                        {{-- MODAL DELETE ENEMIGO --}}
                        <div class="modal fade" id="modalDeleteEnemigo{{ $enemigo->id }}" tabindex="-1"
                            role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    {{-- CAMBIAR RUTA DELETE ENEMIGO --}}
                                    <form action="{{ route('deleteObject') }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h4 class="modal-title">Eliminar enemigo</h4>
                                            <button type="button" class="close"
                                                data-dismiss="modal">&times;</button>
                                        </div>
                                        <div
                                            class="modal-body
                                            <p>¿Estás seguro de que quieres eliminar el enemigo
                                                {{ $enemigo->nombre }}?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="id" value="{{ $enemigo->id }}">
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancelar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach
            </tbody>



            {{-- boton crear enemigo --}}
            <tfoot>
                <tr>
                    <td colspan="5">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modalCreateEnemigo">Crear enemigo
                            <i class="fas fa-plus-circle"></i>
                        </button>
                    </td>
                </tr>
            </tfoot>


            {{-- CAMBIAR TAMBIEN modal  modalCreateEnemigo --}}
            <div class="modal fade" id="modalCreateEnemigo" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">


                        {{-- CAMBIAR RUTA CREAR ENEMIGO --}}
                        <form action="{{ route('createObject') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h4 class="modal-title">Crear enemigo</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control form-control-lg" name="nombre"
                                        placeholder="Nombre" required>
                                </div>
                                <div class="form-group">
                                    <label for="ataque">Ataque</label>
                                    <input type="number" class="form-control form-control-lg" name="ataque"
                                        placeholder="0" required>
                                </div>
                                <div class="form-group">
                                    <label for="%soltar">%Soltar</label>
                                    <input type="number" class="form-control form-control-lg" name="%soltar"
                                        placeholder="0" required>
                                </div>
                                <div class="form-group">
                                    <label for="objeto_id">Objeto_id</label>
                                    <input type="number" class="form-control form-control-lg" name="objeto_id"
                                        placeholder="Objeto_id" required>
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
                                <button type="submit" class="btn btn-success">CREAR ENEMIGO</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </table>
    </div>

    <a href="{{ route('welcome') }}" class="btn btn-primary">Volver</a>

</body>
</html>
