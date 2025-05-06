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

        /* modales */
        .btn-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .yellow {
            background-color: #ffc107;
        }

        .green {
            background-color: #28a745;
        }

        .red {
            background-color: #dc3545;
        }

        .console-body {
            padding: 20px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group span {
            color: lightgreen;
            margin-bottom: 5px;
            display: inline-block;
            margin-right: 1%;
        }

        .form-control {
            background-color: darkgray;
            border: none;
            color: #222;
        }

        .form-control:focus {
            outline: none;
            box-shadow: none;
        }

        .btn {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Barra lateral -->
        <div class="w-25 console-container p-3">
            <button class="btn btn-outline-light mb-3 w-100" data-bs-toggle="modal" data-bs-target="#loginModal">Iniciar
                Sesión</button>
            <button class="btn btn-outline-light mb-3 w-100" data-bs-toggle="modal" data-bs-target="#registerModal">Registro</button>
        </div>
        <!-- Modal Inicio de Sesión -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content console-container">
                    <div class="console-header">
                        <h5 id="loginModalLabel">Inicio de Sesión</h5>
                        <div class="console-controls">
                            <span class="yellow"></span>
                            <span class="green"></span>
                            <span class="red"></span>
                        </div>
                    </div>
                    <div class="console-body">
                        <form action="{{ route('loginEnter') }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <span>user@Name:~$</span>
                                <input type="text" class="form-control" placeholder="Username" name="name">
                            </div>
                            <div class="input-group">
                                <span>user@password:~$</span>
                                <input type="password" class="form-control" placeholder="Contraseña" name="password">
                            </div>
                            <button type="submit" class="btn btn-success w-100">Acceder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Registro -->
        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content console-container">
                    <div class="console-header">
                        <h5 id="registerModalLabel">Registro</h5>
                        <div class="console-controls">
                            <span class="yellow"></span>
                            <span class="green"></span>
                            <span class="red"></span>
                        </div>
                    </div>
                    <div class="console-body">
                        <form action="{{ route('registerEnter') }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <span>user@Name:~$</span>
                                <input type="text" class="form-control" placeholder="Username" name="username">
                            </div>
                            <div class="input-group">
                                <span>user@email:~$</span>
                                <input type="email" class="form-control" placeholder="Email" name="email">
                            </div>
                            <div class="input-group">
                                <span>user@password:~$</span>
                                <input type="password" class="form-control" placeholder="Contraseña" name="password">
                            </div>
                            <div class="input-group">
                                <span>user@cpassword:~$</span>
                                <input type="password" class="form-control" placeholder="Confirmar contraseña"
                                    name="password_confirmation">
                            </div>
                            <button type="submit" class="btn btn-success w-100">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contenido principal -->
        <div class="w-75 console-container mx-auto">
            <div class="console-header">
                <h4 class="m-0">Aquí empieza todo</h4>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
