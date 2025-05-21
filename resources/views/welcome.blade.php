<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Console Minigame</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
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

        button {
            padding: 6px 16px;
            border: 2px solid var(--principal);
            border-radius: 24px;
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
            max-width: 50%;
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
        }

        footer a:hover {
            color: var(--principal);
        }

        footer a:hover::after {
            width: 100%;
        }

        @media (max-width: 768px) {
            footer .row>div {
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

    <nav class="navbar navbar-expand-lg px-4 py-3">
        <div class="container-fluid">-
            <!-- Marca a la izquierda -->
            <a href="#">CONSOLE MINIGAME</a>

            <!-- Hamburguesa a la derecha -->
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menú colapsable -->
            <div class="collapse navbar-collapse justify-content-between" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a href="#">Sobre nosotros</a></li>
                    <li class="nav-item"><a href="#">Mis logros</a></li>
                    <li class="nav-item"><a href="#">Contacto</a></li>
                    <li class="nav-item"><a href="https://minigame-rpg.up.railway.app/map">Mapa</a></li>
                    <li class="nav-item"><a href="https://minigame-rpg.up.railway.app/tiendaOro">Tienda</a></li>
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
                <h4 style="color: black;">¡Descubre Ethereal Realms! El nuevo MMO RPG que revoluciona la fantasía online: mundo abierto
                    dinámico, razas únicas, combates épicos y decisiones que forjan tu leyenda. ¿Estás listo?</h4>
                <button data-bs-toggle="modal" data-bs-target="#registerModal">Registro</button>
            </div>
            <div class="dibujo">
                <img src="logo.png" alt="">
            </div>
        </section>

        <div id="miSlider" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#miSlider" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#miSlider" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#miSlider" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://via.placeholder.com/1200x500?text=Imagen+1" class="d-block w-100" alt="Imagen 1">
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/1200x500?text=Imagen+2" class="d-block w-100" alt="Imagen 2">
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/1200x500?text=Imagen+3" class="d-block w-100" alt="Imagen 3">
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#miSlider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#miSlider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>


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
                                <input type="password" class="form-control" placeholder="Contraseña"
                                    name="password">
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
                                <input type="password" class="form-control" placeholder="Contraseña"
                                    name="password">
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

    <footer class="p-8 bg-dark text-light">
        <hr>
        <div class="container text-md-left">
            <div class="row text-md-left">

                <!-- Sección 2: Navegación -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 fw-bold">Navegación</h6>
                    <p><a href="#" class="text-reset text-decoration-none">Mis logros</a></p>
                    <p><a href="#" class="text-reset text-decoration-none">Mapa</a></p>
                </div>

                <!-- Sección 3: Soporte -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 fw-bold">Soporte</h6>
                    <p><a href="#" class="text-reset text-decoration-none">Centro de ayuda</a></p>
                    <p><a href="#" class="text-reset text-decoration-none">Términos y condiciones</a></p>
                </div>

                <!-- Sección 4: Contacto -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 fw-bold">Contacto</h6>
                    <p><i class="bi bi-envelope-fill me-2"></i> soporte@rpgminigame.com</p>
                    <p><i class="bi bi-github me-2"></i> github.com/rpgminigame</p>
                </div>
            </div>


        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
