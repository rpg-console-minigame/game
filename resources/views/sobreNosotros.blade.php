<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content="Conoce al equipo detrás de RPG Minigame, nuestra historia y misión. Un juego RPG clásico con un toque moderno.">
    <title>Sobre Nosotros - RPG Minigame | Conoce nuestro equipo e historia</title>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://unpkg.com">

    <!-- Preload critical resources -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="https://unpkg.com/aos@2.3.1/dist/aos.css" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
        as="style" onload="this.onload=null;this.rel='stylesheet'">

    <noscript>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    </noscript>

    <style>
        :root {
            --principal: rgb(143, 255, 158);
            --dark-bg: rgb(25, 52, 25);
            --light-bg: rgb(143, 255, 158);
            --text-light: whitesmoke;
            --card-bg: #1f1f1f;
            --transition-time: 0.3s;
        }

        html {
            scroll-behavior: smooth;
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            background: linear-gradient(var(--dark-bg), var(--light-bg));
            background-attachment: fixed;
            color: var(--text-light);
            font-family: "Source Code Pro", monospace;
            line-height: 1.6;
        }

        * {
            box-sizing: border-box;
        }

        /* Barra de navegación */
        nav {
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            height: 10vh;
            min-height: fit-content;
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

        /* Sections */
        section {
            padding: 5rem 0;
            position: relative;
        }

        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 2rem;
        }

        .section-title::after {
            content: "";
            position: absolute;
            width: 50%;
            height: 3px;
            bottom: -10px;
            left: 0;
            background-color: var(--principal);
        }

        .highlight {
            color: var(--principal);
            font-weight: bold;
        }

        /* Team Cards */
        .team-member {
            height: 100%;
            background-color: var(--card-bg);
            border-radius: 12px;
            padding: 2rem;
            transition: all var(--transition-time) ease;
            border: 1px solid rgba(143, 255, 158, 0.1);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .team-member:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            border-color: rgba(143, 255, 158, 0.3);
        }

        .icon {
            font-size: 2.5rem;
            color: var(--principal);
            margin-bottom: 1.5rem;
        }

        /* Footer */
        footer {
            background-color: rgba(0, 0, 0, 0.9);
            backdrop-filter: blur(5px);
            margin-top: auto;
        }

        footer a {
            transition: color var(--transition-time);
        }

        footer a:hover {
            color: var(--principal) !important;
            text-decoration: none;
        }

        .social-icon {
            font-size: 1.2rem;
            transition: transform var(--transition-time);
        }

        .social-icon:hover {
            transform: scale(1.2);
            color: var(--principal) !important;
        }

        /* Responsive */
        @media (max-width: 768px) {
            section {
                padding: 3rem 0;
            }

            .navbar {
                height: auto;
            }

            footer .row>div {
                text-align: center !important;
                margin-bottom: 2rem;
            }

            .section-title::after {
                width: 100%;
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

    <main>
        <!-- Hero Section -->
        <section class="hero-section" data-aos="fade-up">
            <div class="container text-center py-5">
                <h1 class="display-4 mb-4"><span class="highlight text-light">Sobre Nosotros</span></h1>
                <p class="lead fs-4">RPG Minigame no es solo un juego; es una declaración de amor a los clásicos. Nació
                    de la pasión por los juegos retro, las tardes de consola compartida y las historias que nos hacían
                    soñar. Somos un equipo pequeño, sí, pero con una visión tan grande como el universo que estamos
                    creando.
                </p>
            </div>
        </section>


        <!-- Team Section -->
        <section class="team-section">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
                        <div class="team-member text-center">
                            <div class="icon"><i class="bi bi-controller"></i></div>
                            <h4>Alejandro Jiménez Leyva</h4>
                            <p class="mb-0">Líder del proyecto. Encargado del backend y peticiones a la API
                                desarrollo.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
                        <div class="team-member text-center">
                            <div class="icon"><i class="bi bi-code-slash"></i></div>
                            <h4>Alejandro Quintero Pérez</h4>
                            <p class="mb-0">Encargado de la base de datos y subida a producción.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="400">
                        <div class="team-member text-center">
                            <div class="icon"><i class="bi bi-palette-fill"></i></div>
                            <h4>Antonio Jesús Reyes Vera</h4>
                            <p class="mb-0">Diseñador Web, encargado de la Documentación.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="400">
                        <div class="team-member text-center">
                            <div class="icon"><i class="bi bi-palette-fill"></i></div>
                            <h4>Alejandro Moya Montero</h4>
                            <p class="mb-0">Diseñador UI/UX. Responsable de bocetos y paleta de colores.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>



    <footer class="bg-dark text-light pt-5 pb-4">
        <div class="container text-md-left">
            <div class="row text-md-left">
                <!-- Sección 1: Logo y descripción -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 fw-bold" style="color: var(--principal)">
                        RPG MINIGAME
                    </h6>
                    <p>
                        Explora mundos, completa misiones, evoluciona. Un RPG clásico en
                        esencia, moderno en ejecución.
                    </p>
                </div>

                <!-- Sección 2: Navegación -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 fw-bold">Navegación</h6>
                    <p><a href="{{ route('map') }}" class="text-reset text-decoration-none">Mapa</a></p>
                    <p><a href="{{ route('sobreNosotros') }}" class="text-reset text-decoration-none">Sobre
                            Nosotros</a></p>
                </div>

                <!-- Sección 3: Soporte -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 fw-bold">Soporte</h6>
                    <p>
                        <a href="{{ route('contacto') }}" class="text-reset text-decoration-none">Contacto</a>
                    </p>
                </div>

                <!-- Sección 4: Contacto -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 fw-bold">Contacto</h6>
                    <p></i>consoleminigamerpg@gmail.com
                    </p>
                    <p>github.com/rpgminigame</p>
                </div>
            </div>

            <!-- Línea divisoria -->
            <hr class="my-4" style="border-top: 1px solid #444" />

            <!-- Derechos -->
            <div class="row">
                <div class="col-md-7 col-lg-8">
                    <p class="text-center text-md-start">
                        © 2025 RPG Minigame. Todos los derechos reservados.
                    </p>
                </div>
            </div>
        </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS
            AOS.init({
                duration: 800,
                once: true,
                easing: 'ease-out-quad'
            });

            // Add scroll effect to navbar
            window.addEventListener('scroll', function() {
                const navbar = document.querySelector('.navbar');
                if (window.scrollY > 50) {
                    navbar.style.height = '70px';
                    navbar.style.backgroundColor = 'rgba(0, 0, 0, 0.9)';
                } else {
                    navbar.style.height = '80px';
                    navbar.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
                }
            });
        });
    </script>
</body>

</html>
