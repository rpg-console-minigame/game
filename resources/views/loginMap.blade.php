<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - RPG Minigame</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
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
    </style>
</head>

<body>

    <!-- NAVBAR RESPONSIVE (versión igual a la vista 2) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 py-3">
        <a class="navbar-brand fw-bold" href="#">RPG MINIGAME</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="#">Documentación</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Sobre nosotros</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Mis logros</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
            </ul>
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
                <form action="{{ route('mapEditor') }}" method="POST">
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


    <footer class="bg-dark text-light pt-5 pb-4">
    <div class="container text-md-left">
        <div class="row text-md-left">

            <!-- Sección 1: Logo y descripción -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 fw-bold" style="color: var(--principal);">RPG MINIGAME</h6>
                <p>Explora mundos, completa misiones, evoluciona. Un RPG clásico en esencia, moderno en ejecución.</p>
            </div>

            <!-- Sección 2: Navegación -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 fw-bold">Navegación</h6>
                <p><a href="#" class="text-reset text-decoration-none">Inicio</a></p>
                <p><a href="#" class="text-reset text-decoration-none">Documentación</a></p>
                <p><a href="#" class="text-reset text-decoration-none">Mis logros</a></p>
                <p><a href="#" class="text-reset text-decoration-none">Mapa</a></p>
            </div>

            <!-- Sección 3: Soporte -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 fw-bold">Soporte</h6>
                <p><a href="#" class="text-reset text-decoration-none">Preguntas Frecuentes</a></p>
                <p><a href="#" class="text-reset text-decoration-none">Centro de ayuda</a></p>
                <p><a href="#" class="text-reset text-decoration-none">Contacto</a></p>
                <p><a href="#" class="text-reset text-decoration-none">Términos y condiciones</a></p>
            </div>

            <!-- Sección 4: Contacto -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 fw-bold">Contacto</h6>
                <p><i class="bi bi-envelope-fill me-2"></i> soporte@rpgminigame.com</p>
                <p><i class="bi bi-github me-2"></i> github.com/rpgminigame</p>
                <p><i class="bi bi-globe me-2"></i> www.rpgminigame.com</p>
            </div>
        </div>

        <!-- Línea divisoria -->
        <hr class="my-4" style="border-top: 1px solid #444;" />

        <!-- Derechos -->
        <div class="row">
            <div class="col-md-7 col-lg-8">
                <p class="text-center text-md-start">© 2025 RPG Minigame. Todos los derechos reservados.</p>
            </div>
            <div class="col-md-5 col-lg-4">
                <div class="text-center text-md-end">
                    <a href="#" class="text-reset me-3"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="text-reset me-3"><i class="bi bi-discord"></i></a>
                    <a href="#" class="text-reset me-3"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
