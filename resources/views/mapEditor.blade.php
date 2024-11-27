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

<body>
    @for ($i = 0; $i < 10; $i++)
        <div class="row">
            @for ($j = 0; $j < 10; $j++)
                @if ($map->where('coord_x', $i)->where('coord_y', $j)->count() == 1)
                    <div class="col-1" style="height: 50px; width: 50px; background-color: red;
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
                        }?>">
                        {{-- <a href="{{ route('delete', ['coord_x' => $i, 'coord_y' => $j]) }}">Edit</a> --}}
                        <p type="button" data-toggle="modal" data-target="#modalEdit{{$i}}-{{$j}}">Edit</p>
                        <div class="modal" id="modalEdit{{$i}}-{{$j}}">
                            <div class="modal-dialog">
                                <div class="modal-content"><form action="{{ route('update') }}" method="GET">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Modal Heading</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <input type="text" name="nombre" placeholder="Nombre" value="{{$map->where('coord_x', $i)->where('coord_y', $j)->first()->nombre}}">
                                        {{-- <input type="text" name="ruta_IMG" placeholder="Ruta IMG"> --}}
                                        <input type="text" name="descripcion" placeholder="Descripcion" value="{{$map->where('coord_x', $i)->where('coord_y', $j)->first()->descripcion}}">
                                        <label for="up_door">¿Muro arriba?</label>
                                        <input type="checkbox" name="up_door" value="1" 
                                        @if ($map->where('coord_x', $i)->where('coord_y', $j)->first()->up_door != 1)
                                            checked
                                        @endif>
                                        <label for="down_door">¿Muro abajo?</label>
                                        <input type="checkbox" name="down_door" value="1" 
                                        @if ($map->where('coord_x', $i)->where('coord_y', $j)->first()->down_door != 1)
                                            checked
                                        @endif>
                                        <label for="left_door">¿Muro a la izquierda?</label>
                                        <input type="checkbox" name="left_door" value="1" 
                                        @if ($map->where('coord_x', $i)->where('coord_y', $j)->first()->left_door != 1)
                                            checked
                                        @endif>
                                        <label for="right_door">¿Muro a la derecha?</label>
                                        <input type="checkbox" name="right_door" value="1" 
                                        @if ($map->where('coord_x', $i)->where('coord_y', $j)->first()->right_door != 1)
                                            checked
                                        @endif>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <input type="hidden" name="coord_x" value="{{$i}}">
                                        <input type="hidden" name="coord_y" value="{{$j}}">
                                        {{-- <a href="?coord_x={{$i}}&coord_y={{$j}}" class="btn btn-primary">Create</a> --}}
                                        <a href="{{ route('delete', ['coord_x' => $i, 'coord_y' => $j]) }}" class="btn btn-danger">Delete</a>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>

                                </form></div>
                            </div>
                        </div>
                    </div>
                @elseif (
                    $map->where('coord_x', $i + 1)->where('coord_y', $j)->count() == 1 ||
                        $map->where('coord_x', $i - 1)->where('coord_y', $j)->count() == 1 ||
                        $map->where('coord_x', $i)->where('coord_y', $j + 1)->count() == 1 ||
                        $map->where('coord_x', $i)->where('coord_y', $j - 1)->count() == 1)
                    <div class="col-1" style="height: 50px; width: 50px; background-color: green;">
                        {{-- <a href="{{ route('create', ['coord_x' => $i, 'coord_y' => $j]) }}">Create</a> --}}
                        <p type="button" data-toggle="modal" data-target="#modalCreate{{$i}}-{{$j}}">Create</p>
                        <!-- The Modal -->
                        <div class="modal" id="modalCreate{{$i}}-{{$j}}">
                            <div class="modal-dialog">
                                <div class="modal-content"><form action="{{ route('create') }}" method="GET">

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
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <input type="hidden" name="coord_x" value="{{$i}}">
                                        <input type="hidden" name="coord_y" value="{{$j}}">
                                        {{-- <a href="?coord_x={{$i}}&coord_y={{$j}}" class="btn btn-primary">Create</a> --}}
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>

                                </form></div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-1" style="height: 50px; width: 50px; background-color: blue;"></div>
                @endif
            @endfor
        </div>
    @endfor
</body>
</html>
