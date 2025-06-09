<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - RPG Minigame</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        html {
            scroll-behavior: smooth;
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            height: 100%;
            margin: 0;
            padding: 0;
            background: linear-gradient(rgb(25, 52, 25), rgb(143, 255, 158));
            background-attachment: fixed;
        }

        :root {
            --principal: rgb(143, 255, 158);
        }

        * {
            font-family: "Source Code Pro", monospace;
            box-sizing: border-box;
        }

        /* Barra de navegación */
        nav {
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            height: 10vh;
        }

        nav a {
            margin: 0 1rem;
            text-decoration: none;
            color: whitesmoke;
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
            background-color: whitesmoke;
            transition: width 0.3s ease-in-out;
        }

        nav a:hover::after {
            width: 100%;
        }

        .console-container {
            background-color: #2d2d2d;
            color: #e0e0e0;
            border-radius: 10px;
            overflow: hidden;
            width: 100%;
            max-width: 500px;
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
            padding: 1rem;
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

        footer a {
            position: relative;
            text-decoration: none;
            color: #e0e0e0;
            transition: color 0.3s;
        }

        footer a::after {
            content: "";
            position: absolute;
            width: 0%;
            height: 2px;
            left: 0;
            bottom: -3px;
            background-color: var(--principal);
            transition: width 0.3s ease-in-out;
        }

        footer a:hover {
            color: var(--principal);
        }

        footer a:hover::after {
            width: 100%;
        }

        @media (max-width: 768px) {
            footer .row > div {
                text-align: center !important;
                margin-bottom: 1.5rem;
            }

            footer .text-start {
                text-align: center !important;
            }

            footer ul {
                padding-left: 0;
            }

            footer li {
                list-style: none;
            }
        }

    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg px-4 py-3">
        <div class="container-fluid">
            <!-- Marca a la izquierda -->
            <a href="{{ route('welcome') }}">CONSOLE MINIGAME</a>

            <!-- Hamburguesa a la derecha -->
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menú colapsable -->
            <div class="collapse navbar-collapse justify-content-between" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a href="{{ route('sobreNosotros') }}">Sobre nosotros</a></li>
                    <!-- <li class="nav-item"><a href="#">Mis logros</a></li> -->
                    <li class="nav-item"><a href="{{ route('contacto') }}">Contacto</a></li>
                    <li class="nav-item"><a href="{{ route('map') }}">Mapa</a></li>
                    <li class="nav-item"><a href="{{ route('tiendaOro') }}">Tienda</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- LOGIN EN PANTALLA -->
    <div class="container-center">
        <div class="console-container">
            <div class="console-header">
                <h5>Inicio de Sesión</h5>
                <div class="console-controls">
                    <span class="yellow"></span>
                    <span class="green"></span>
                    <span class="red"></span>
                </div>
            </div>
            <div class="console-body">
                <form action="{{ route('mapEditorLoginPost') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <span>user@Name:~$</span>
                        <input type="text" name="name" placeholder="Nombre de Usuario" required />
                    </div>
                    <div class="input-group">
                        <span>user@password:~$</span>
                        <input type="password" name="password" placeholder="Contraseña" required />
                    </div>
                    <button type="submit" class="w-100">Iniciar sesión</button>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
