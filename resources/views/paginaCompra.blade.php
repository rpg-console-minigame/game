<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Confirmación de Pago - RPG Minigame</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
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

    .success-container {
      min-height: 80vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 2rem;
    }

    .success-icon {
      font-size: 4rem;
      color: var(--principal);
    }

    .success-box {
      background-color: #1f1f1f;
      border: 1px solid #333;
      border-radius: 12px;
      padding: 2rem;
      max-width: 500px;
      width: 100%;
      margin-top: 2rem;
    }

    .btn-principal {
      padding: 10px 20px;
      border: 2px solid var(--principal);
      border-radius: 10px;
      background-color: var(--principal);
      color: #121212;
      font-weight: bold;
      transition: all 0.3s ease;
      text-decoration: none;
    }

    .btn-principal:hover {
      background-color: transparent;
      color: white;
      border-color: white;
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
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item mx-2"><a class="nav-link" href="#">Inicio</a></li>
          <li class="nav-item mx-2"><a class="nav-link" href="#">Tienda de Oro</a></li>
          <li class="nav-item mx-2"><a class="nav-link" href="#">Inventario</a></li>
          <li class="nav-item mx-2"><a class="nav-link" href="#">Perfil</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- CONTENIDO -->
  <div class="success-container">
    <i class="bi bi-check-circle-fill success-icon"></i>
    <h2 class="mt-3">¡Pago realizado con éxito!</h2>
    <div class="success-box mt-3">
      <p>Gracias por tu compra. Has recibido:</p>
      <h4 class="fw-bold text-success">1500 de oro</h4>
      <p>ID de transacción: <code>#TXN2025-0941</code></p>
      <p>¡Ahora puedes volver a jugar y usar tu nuevo oro!</p>

      <a href="{{ route("devolver") }}" class="btn-principal mt-3 d-inline-block">Volver al juego</a>
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
