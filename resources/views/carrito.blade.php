<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Carrito - Tienda de Oro</title>
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

    .cart-container {
      padding: 3rem 1rem;
    }

    .cart-item {
      background-color: #1e1e1e;
      border: 1px solid #333;
      border-radius: 10px;
      padding: 1.5rem;
      margin-bottom: 1rem;
    }

    .cart-item h5 {
      color: var(--principal);
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

  <!-- CONTENIDO CARRITO -->
  <div class="container cart-container">
    <h2 class="mb-4">🛒 Tu carrito de compra</h2>
    <div class="cart-item">
      <h5>Bolsa de Oro (500)</h5>
      <p>Precio: 2.99 €</p>
    </div>
    <div class="cart-item">
      <h5>Cofre de Oro (1500)</h5>
      <p>Precio: 6.99 €</p>
    </div>
    <div class="text-end mt-4">
      <h4>Total: 9.98 €</h4>
      <a href="pago.html"><button class="mt-2">Proceder al Pago</button></a>
    </div>
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
