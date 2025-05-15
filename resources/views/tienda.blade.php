<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tienda - RPG Minigame</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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

        .card {
            background-color: #1e1e1e;
            border: 1px solid #444;
            border-radius: 10px;
            color: #e0e0e0;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.02);
            border-color: var(--principal);
        }

        .btn-custom {
            background-color: var(--principal);
            border: 2px solid var(--principal);
            color: #121212;
            font-weight: bold;
        }

        .btn-custom:hover {
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
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 py-3">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">RPG MINIGAME</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#">Documentación</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Sobre nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Mis logros</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- TIENDA -->
    <div class="container py-5">
    <h2 class="text-center mb-5" style="color: var(--principal);">Tienda de Objetos</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($tienda as $item)
            <div class="col">
                <div class="card h-100 text-center">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="{{ $item->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nombre }}</h5>
                        <p class="card-text">{{ $item->descripcion }}</p>
                        <p class="card-text fw-bold text-warning">
                            {{ $item->precio_oro }} <i class="fa-solid fa-coins"></i>
                        </p>
                        <button class="btn btn-custom">Comprar</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


    <!-- FOOTER -->
    <footer class="bg-dark text-light pt-5 pb-4">
        <div class="container text-md-left">
            <div class="row text-md-left">
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 fw-bold" style="color: var(--principal);">RPG MINIGAME</h6>
                    <p>Explora mundos, completa misiones, evoluciona. Un RPG clásico en esencia, moderno en ejecución.</p>
                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 fw-bold">Navegación</h6>
                    <p><a href="#" class="text-reset text-decoration-none">Inicio</a></p>
                    <p><a href="#" class="text-reset text-decoration-none">Documentación</a></p>
                    <p><a href="#" class="text-reset text-decoration-none">Mis logros</a></p>
                    <p><a href="#" class="text-reset text-decoration-none">Mapa</a></p>
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 fw-bold">Soporte</h6>
                    <p><a href="#" class="text-reset text-decoration-none">Preguntas Frecuentes</a></p>
                    <p><a href="#" class="text-reset text-decoration-none">Centro de ayuda</a></p>
                    <p><a href="#" class="text-reset text-decoration-none">Contacto</a></p>
                    <p><a href="#" class="text-reset text-decoration-none">Términos y condiciones</a></p>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 fw-bold">Contacto</h6>
                    <p><i class="bi bi-envelope-fill me-2"></i> soporte@rpgminigame.com</p>
                    <p><i class="bi bi-github me-2"></i> github.com/rpgminigame</p>
                    <p><i class="bi bi-globe me-2"></i> www.rpgminigame.com</p>
                </div>
            </div>
            <hr class="my-4" style="border-top: 1px solid #444;" />
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
