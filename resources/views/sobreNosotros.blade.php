<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sobre Nosotros - RPG Minigame</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

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

    nav a, footer a {
      margin: 0 1rem;
      text-decoration: none;
      color: #e0e0e0;
      font-weight: bold;
      position: relative;
      transition: color 0.3s;
    }

    nav a::after, footer a::after {
      content: "";
      position: absolute;
      width: 0%;
      height: 2px;
      left: 0;
      bottom: -3px;
      background-color: var(--principal);
      transition: width 0.3s ease-in-out;
    }

    nav a:hover, footer a:hover {
      color: var(--principal);
    }

    nav a:hover::after, footer a:hover::after {
      width: 100%;
    }

    section {
      padding: 4rem 1rem;
    }

    .highlight {
      color: var(--principal);
    }

    .team-member {
      background-color: #1f1f1f;
      border-radius: 12px;
      padding: 1.5rem;
      transition: transform 0.3s ease;
    }

    .team-member:hover {
      transform: translateY(-8px);
    }

    .icon {
      font-size: 2rem;
      color: var(--principal);
      margin-bottom: 1rem;
    }

    @media (max-width: 768px) {
      footer .row > div {
        text-align: center !important;
        margin-bottom: 1.5rem;
      }
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <div class="container-fluid">
            <!-- Título -->
            <a class="navbar-brand fw-bold" href="{{ route('welcome') }}">RPG MINIGAME</a>

            <!-- Hamburguesa a la derecha -->
            <button class="navbar-toggler ms-auto border-success" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Enlaces -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Documentacion</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sobreNosotros') }}">Sobre nosotros</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Mis logros</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contacto') }}">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

  <!-- SOBRE NOSOTROS -->
  <section data-aos="fade-up">
    <div class="container text-center">
      <h1 class="mb-4"><span class="highlight">Sobre Nosotros</span></h1>
      <p class="lead">RPG Minigame nació de una pasión por los juegos retro y la narrativa inmersiva. Somos un equipo pequeño con grandes sueños, que busca traer de vuelta la magia de los RPG clásicos... con un toque moderno.</p>
    </div>
  </section>

  <section data-aos="fade-right">
    <div class="container">
      <h2 class="highlight mb-4">Nuestra Historia</h2>
      <p>Todo comenzó en una habitación oscura, llena de cables y café. Un grupo de amigos de toda la vida frustrados por la falta de juegos RPG simples pero profundos decidió crear uno. Así nació *RPG Minigame*, una aventura que combina píxeles, pasión y progreso constante.</p>
    </div>
  </section>

  <section>
  <div class="container">
    <h2 class="highlight mb-4 text-center">Nuestro Equipo</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
      <div class="col">
        <div class="team-member text-center">
          <div class="icon"><i class="bi bi-controller"></i></div>
          <h5>Alejandro Jiménez Leyva</h5>
          <p>Encargado de llevar todo hacia delante</p>
        </div>
      </div>
      <div class="col">
        <div class="team-member text-center">
          <div class="icon"><i class="bi bi-code-slash"></i></div>
          <h5>Alejandro Quintero Pérez</h5>
          <p>Encargado de Base de Datos y de los Servicios en Producción.</p>
        </div>
      </div>
      <div class="col">
        <div class="team-member text-center">
          <div class="icon"><i class="bi bi-music-note-beamed"></i></div>
          <h5>Antonio Jesús Reyes Vera</h5>
          <p>Diseñador Web y encargado de la Documentación.</p>
        </div>
      </div>
      <div class="col">
        <div class="team-member text-center">
          <div class="icon"><i class="bi bi-palette-fill"></i></div>
          <h5>Alejandro Moya Montero</h5>
          <p>Diseñadora Web.</p>
        </div>
      </div>
    </div>
  </div>
</section>


  <section data-aos="fade-up">
    <div class="container text-center">
      <h2 class="highlight mb-4">Nuestra Misión</h2>
      <p>Crear un universo donde cada jugador sienta que su historia importa.</p>
      <h2 class="highlight mt-5 mb-4">Nuestra Visión</h2>
      <p>Revolucionar los minijuegos RPG y construir una comunidad vibrante alrededor de ellos.</p>
    </div>
  </section>

  <!-- FOOTER -->
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
                    <p>
                        <a href="{{ route('welcome') }}" class="text-reset text-decoration-none">RPG MINIGAME</a>
                    </p>
                    <p><a href="{{ route('map') }}" class="text-reset text-decoration-none">Mapa</a></p>
                    <p><a href="{{ route('sobreNosotros') }}" class="text-reset text-decoration-none">Sobre Nosotros</a></p>
                </div>

                <!-- Sección 3: Soporte -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 fw-bold">Soporte</h6>
                    <p>
                        <a href="{{ route('contacto') }}" class="text-reset text-decoration-none">Contacto</a>
                    </p>
                    <!-- <p>
                        <a href="#" class="text-reset text-decoration-none">Preguntas Frecuentes</a>
                    </p>
                    <p>
                        <a href="#" class="text-reset text-decoration-none">Términos y condiciones</a>
                    </p> -->
                </div>

                <!-- Sección 4: Contacto -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 fw-bold">Contacto</h6>
                    <p>
                        <i class="bi bi-envelope-fill me-2"></i> soporte@rpgminigame.com
                    </p>
                    <p><i class="bi bi-github me-2"></i> github.com/rpgminigame</p>
                    <p><i class="bi bi-globe me-2"></i> www.rpgminigame.com</p>
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

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 800,
      once: true
    });
  </script>
</body>
</html>
