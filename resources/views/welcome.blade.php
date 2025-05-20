<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modelo Ajustado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #121212;
            color: #e0e0e0;
        }

        :root {
            --principal: #27c93f;
        }

        * {
            font-family: "Source Code Pro", monospace;
            box-sizing: border-box;
        }

        /* Barra de navegación */
        nav {
/*             display: flex;
            justify-content: space-between; */
            align-items: center;
            padding: 1rem 10%;
            background-color: #1e1e1e;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            position: sticky;
            top: 0;
            z-index: 1000;
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

        /* Sección principal */
        main {
            padding: 5% 10%;
        }

        /* Hero */
        .info {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            margin-bottom: 4rem;
        }

        .dibujo {
            flex: 1;
            text-align: center;
            padding: 1rem;
        }

        .dibujo img {
            max-width: 100%;
            height: auto;
        }

        .texto {
            flex: 2;
            padding: 1rem;
        }

        .texto h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            line-height: 1.3;
            color: #ffffff;
        }

        .texto h4 {
            font-size: 1rem;
            font-weight: normal;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            color: #cccccc;
        }

        /* Demo section */
        .demo {
            background-color: var(--principal);
            color: white;
            padding: 2rem;
            text-align: center;
            border-radius: 10px;
            margin-top: 3rem;
        }

        .demo h2 {
            font-size: 1.5rem;
            margin: 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            nav {
                flex-direction: column;
                padding: 1rem 5%;
            }

            .info {
                flex-direction: column;
            }

            .texto h2 {
                font-size: 2rem;
            }
        }

        /* ESTILOS DE LOS MODALES */

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
            font-family: 'Courier New', Courier, monospace;
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

        .input-group input:focus {
            outline: none;
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

        .input-group input::placeholder {
            color: #bbbbbb;
            transition: color 0.3s;
        }

        .input-group input:hover::placeholder {
            color: #ffffff;
        }

        .input-group input:focus::placeholder {
            color: black;
        }

    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 py-3">
    <div class="container-fluid">
        <!-- Marca a la izquierda -->
        <a class="navbar-brand fw-bold" href="#">RPG MINIGAME</a>

        <!-- Hamburguesa a la derecha -->
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menú colapsable -->
        <div class="collapse navbar-collapse justify-content-between" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="#">Documentación</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Sobre nosotros</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Mis logros</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
                <li class="nav-item"><a class="nav-link" href="https://minigame-rpg.up.railway.app/map">Mapa</a></li>
                <li class="nav-item"><a class="nav-link" href="https://minigame-rpg.up.railway.app/tiendaOro">Tienda</a></li>
            </ul>
            <div class="d-flex">
                <button data-bs-toggle="modal" data-bs-target="#loginModal">Iniciar Sesión</button>
            </div>
        </div>
    </div>
</nav>

    <main>

        <section class="info">
            <div class="texto">
                <h2>RPG Console Minigame, un videojuego web lleno de sorpresas.</h2>
                <h4>¡Descubre Ethereal Realms! El nuevo MMO RPG que revoluciona la fantasía online: mundo abierto
                    dinámico, razas únicas, combates épicos y decisiones que forjan tu leyenda. ¿Estás listo?</h4>
                <button data-bs-toggle="modal" data-bs-target="#registerModal">Registro</button>
            </div>
            <div class="dibujo">
                <img src="dibujo.png" alt="">
            </div>
        </section>

        <!-- Contenido principal -->
        <section class="demo">
            <h2 style="color: black;">Prueba una versión beta de nuestro juego.</h2>


        </section>

    </main>


    <div class="d-flex">

        <!-- Modal Inicio de Sesión -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content console-container">
                    <div class="console-header">
                        <h5 id="loginModalLabel">Inicio de Sesión</h5>
                        <div class="console-controls">
                            <span class="yellow"></span>
                            <span class="green"></span>
                            <span class="red" data-bs-dismiss="modal" style="cursor: pointer;"></span>
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
                            <button type="submit" class="w-100">Acceder</button>
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
                            <span class="red" data-bs-dismiss="modal" style="cursor: pointer;"></span>
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
                            <button type="submit" class="w-100">Enviar</button>
                        </form>
                    </div>
                </div>
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
