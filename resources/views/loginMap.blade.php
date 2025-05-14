<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - RPG Minigame</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --principal: #27c93f;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #121212;
            color: #e0e0e0;
            font-family: "Source Code Pro", monospace;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 10%;
            background-color: #1e1e1e;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        nav a {
            margin: 0 1rem;
            text-decoration: none;
            color: #e0e0e0;
            font-weight: bold;
            position: relative;
            transition: color 0.3s;
        }

        nav a::after {
            content: "";
            position: absolute;
            width: 0%;
            height: 2px;
            left: 0;
            bottom: -3px;
            background-color: var(--principal);
            transition: width 0.3s ease-in-out;
        }

        nav a:hover {
            color: var(--principal);
        }

        nav a:hover::after {
            width: 100%;
        }

        button {
            padding: 6px 16px;
            border: 2px solid var(--principal);
            border-radius: 10px;
            background-color: var(--principal);
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: transparent;
            color: white;
            border-color: white;
        }

        /* MODAL estilo consola */
        .modal-content.console-container {
            background-color: #2d2d2d;
            color: #e0e0e0;
            border-radius: 10px;
            overflow: hidden;
        }

        .console-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1a1a1a;
            padding: 1rem;
            border-bottom: 1px solid #444;
        }

        .console-header h5 {
            margin: 0;
            font-size: 1.2rem;
            color: #fff;
        }

        .console-controls span {
            display: inline-block;
            width: 12px;
            height: 12px;
            margin-left: 6px;
            border-radius: 50%;
        }

        .console-controls .red {
            background-color: #ff5f56;
        }

        .console-controls .yellow {
            background-color: #ffbd2e;
        }

        .console-controls .green {
            background-color: #27c93f;
        }

        .console-body {
            padding: 1.5rem;
        }

        .input-group {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            background-color: #1f1f1f;
            border-radius: 5px;
            padding: 0.5rem;
        }

        .input-group span {
            margin-right: 0.5rem;
            white-space: nowrap;
            color: #ccc;
        }

        .input-group input {
            flex-grow: 1;
            background-color: transparent;
            border: none;
            color: white;
            outline: none;
            padding: 0.5rem;
            font-size: 1rem;
        }

        .container-center {
            height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav>
        <a class="navbar-brand fw-bold" href="#">RPG MINIGAME</a>
        <div>
            <a href="#">Documentación</a>
            <a href="#">Sobre nosotros</a>
            <a href="#">Mis logros</a>
            <a href="#">Contacto</a>
        </div>
        <button data-bs-toggle="modal" data-bs-target="#loginModal">Iniciar Sesión</button>
    </nav>

    <!-- MODAL LOGIN -->
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
                    <form action="{{ route('mapEditor') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <span>user@Name:~$</span>
                            <input type="text" name="name" placeholder="Nombre de Usuario" required>
                        </div>
                        <div class="input-group">
                            <span>user@password:~$</span>
                            <input type="password" name="password" placeholder="Contraseña" required>
                        </div>
                        <button type="submit" class="w-100">Iniciar sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- BOTÓN CENTRADO PARA ABRIR MODAL -->
    <div class="container-center">
        <button data-bs-toggle="modal" data-bs-target="#loginModal">Abrir Login</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
