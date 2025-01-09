<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modelo Ajustado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            background-color: #222;
            color: #ddd;
            font-family: "Source Code Pro", monospace;
        }

        .d-flex {
            height: 100%;
        }

        .console-container {
            border: 4px solid #bbb;
            background-color: #333;
            color: #ddd;
            height: 100%;
        }

        .console-header {
            background-color: #bbb;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 8px 12px;
            border-bottom: 4px solid #bbb;
        }

        .console-header h4 {
            margin: 0;
            color: #222;
            font-weight: bold;
            text-align: center;
        }

        .form-control {
            background-color: #444;
            color: #ddd;
            border: none;
            border-radius: 4px;
            margin-bottom: 15px;
            font-family: "Source Code Pro", monospace;
        }

        .form-control:focus {
            background-color: #555;
            color: #fff;
            outline: none;
            box-shadow: none;
        }

        .btn-submit {
            background-color: lightgreen;
            color: #222;
            font-weight: bold;
            border: none;
            border-radius: 4px;
            width: 100%;
            padding: 10px;
            font-family: "Source Code Pro", monospace;
        }

        .btn-submit:hover {
            background-color: #32cd32;
        }

        .input-label {
            color: #ddd;
            margin-bottom: 5px;
            font-family: "Source Code Pro", monospace;
        }

        .form-container {
            width: 50%;
            margin: auto;
            border: 4px solid #bbb;
            border-radius: 8px;
            background-color: #333;
            padding: 20px;
            margin-top: 50px;
        }

        .fixed-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
        }

        .console-header .d-flex p {
            margin-top: 4px;
        }

        .info-box {
            max-height: 355px;
            overflow-y: auto;
            padding: 10px;
            background-color: #444;
            border-radius: 5px;
            border: 1px solid #555;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Barra lateral -->
        <div class="w-25 console-container p-3">
            <button class="btn btn-outline-light mb-3 w-100">PJ1</button>
            <button class="btn btn-outline-light mb-3 w-100">PJ2</button>
            <button class="btn btn-outline-light mb-3 w-100">PJ3</button>
            <button class="btn btn-outline-light w-100">CREAR</button>
        </div>

        <!-- Contenido principal -->
        <div class="w-75 console-container mx-auto">
            <div class="console-header">
                <!-- Nombre centrado -->
                <h4 class="m-0">Crear</h4>
            </div>

            <!-- Formulario -->
            <div class="form-container">
                <form>
                    <div class="form-group">
                        <label for="name" class="input-label">Nombre</label>
                        <input type="text" id="name" class="form-control" placeholder="Introduce tu nombre">
                    </div>

                    <div class="form-group">
                        <label for="zones" class="input-label">Zonas del Videojuego</label>
                        <select id="zones" class="form-control">
                            <option value="">Selecciona una zona</option>
                            <option value="zona1">Zona 1</option>
                            <option value="zona2">Zona 2</option>
                            <option value="zona3">Zona 3</option>
                            <option value="zona4">Zona 4</option>
                            <option value="zona5">Zona 5</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="options" class="input-label">Opciones</label>
                        <input type="text" id="options" class="form-control" placeholder="Introduce tus opciones">
                    </div>

                    <button type="submit" class="btn-submit">Crear</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Botón jugar -->
    <div class="fixed-button">
        <button class="btn btn-success btn-jugar">JUGAR</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
