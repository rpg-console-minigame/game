<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tienda de Oro - RPG Minigame</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <style>
    :root {
      --principal: #27c93f;
    }

    body {
      background-color: #121212;
      color: #e0e0e0;
      font-family: "Source Code Pro", monospace;
      margin: 0;
      padding: 0;
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

    .gold-card {
      background-color: #1f1f1f;
      border-radius: 10px;
      padding: 1.5rem;
      box-shadow: 0 0 8px rgba(0, 255, 0, 0.1);
      display: flex;
      align-items: center;
      justify-content: space-between;
      transition: transform 0.3s ease;
    }

    .gold-card:hover {
      transform: translateY(-5px);
    }

    .gold-icon {
      font-size: 2.5rem;
      color: var(--principal);
      margin-right: 1.5rem;
    }

    .gold-info h5 {
      margin: 0;
      color: #fff;
      font-weight: bold;
    }

    .gold-info p {
      margin: 0.25rem 0 0;
      color: #ccc;
    }

    .buy-button {
      padding: 6px 16px;
      border: 2px solid var(--principal);
      border-radius: 10px;
      background-color: var(--principal);
      font-weight: bold;
      cursor: pointer;
      transition: all 0.3s ease;
      color: #000;
    }

    .buy-button:hover {
      background-color: transparent;
      color: white;
      border-color: white;
    }

    .store-container {
      padding: 4rem 1rem;
      max-width: 900px;
      margin: auto;
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
      .gold-card {
        flex-direction: column;
        align-items: flex-start;
        text-align: left;
        gap: 1rem;
      }

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

  <!-- TIENDA DE ORO -->
  <div class="store-container">
  <h2 class="text-center mb-5" style="color: var(--principal);">Tienda de Objetos</h2>

  @foreach ($tienda as $item)
    <div class="gold-card mb-4">
      <div class="d-flex align-items-center">
        <i class="bi bi-coin gold-icon"></i>
        <div class="gold-info">
          <h5>{{ $item->nombre }}</h5>
          <p>{{ $item->cantidad_oro }} monedas de oro</p>
        </div>
      </div>
      <div>
        <p class="mb-2 fw-bold">{{ $item->precio }} €</p>
        <form action="{{ route('tiendaOroShow') }}" method="GET">
          @csrf
          <button type="submit" class="buy-button">Comprar</button>
        </form>
      </div>
    </div>
  @endforeach
</div>



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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
