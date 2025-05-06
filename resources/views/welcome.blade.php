<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Modelo Ajustado</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    html,
    body {
      height: 100%;
      margin: 0;
      background-color: #1e1e1e;
      color: #ddd;
      font-family: "Source Code Pro", monospace;
    }

    .navbar {
      background-color: #333;
    }

    .navbar-brand,
    .nav-link {
      color: #ddd !important;
    }

    .nav-link:hover {
      color: lightgreen !important;
    }

    .console-container {
      border-left: 4px solid #888;
      background-color: #2b2b2b;
      color: #ddd;
      height: 100%;
    }

    .console-header {
      background-color: #444;
      text-align: center;
      padding: 15px;
      border-bottom: 4px solid #666;
    }

    .console-header h4 {
      color: lightgreen;
      margin: 0;
    }

    .form-control,
    .input-group span {
      background-color: #444;
      color: #ddd;
      border: none;
    }

    .form-control:focus {
      background-color: #555;
      color: #fff;
      outline: none;
      box-shadow: none;
    }

    .btn-success {
      background-color: lightgreen;
      border: none;
      color: #222;
      font-weight: bold;
    }

    .btn-success:hover {
      background-color: #32cd32;
    }

    .modal-content {
      background-color: #333;
      border: 2px solid #888;
    }

    .input-group span {
      margin-right: 10px;
      color: lightgreen;
    }

    .sidebar-user {
      text-align: center;
      padding: 20px;
      border-bottom: 1px solid #555;
    }

    .sidebar-user img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      margin-bottom: 10px;
    }

    .sidebar-user h5 {
      color: #fff;
    }

    .achievements {
      padding: 10px 20px;
    }

    .achievements h6 {
      color: lightgreen;
      margin-bottom: 10px;
    }

    .achievements ul {
      list-style: none;
      padding-left: 0;
    }

    .achievements li {
      color: #ccc;
      margin-bottom: 6px;
    }

    .console-body {
      padding: 20px;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid px-4">
      <a class="navbar-brand" href="#">MiApp</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Sobre Nosotros</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Mis Logros</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="d-flex" style="height: calc(100% - 56px);">
    <!-- Sidebar -->
    <aside class="console-container w-25">
      <div class="sidebar-user">
        <img src="https://via.placeholder.com/80" alt="User">
        <h5>Usuario: Juan Pérez</h5>
      </div>
      <div class="achievements">
        <h6>🏆 Logros:</h6>
        <ul>
          <li>✔️ Registro completo</li>
          <li>✔️ Primer inicio de sesión</li>
          <li>✔️ Logro especial desbloqueado</li>
        </ul>
      </div>
      <div class="px-3">
        <button class="btn btn-outline-light w-100 mb-3" data-bs-toggle="modal" data-bs-target="#loginModal">Iniciar Sesión</button>
        <button class="btn btn-outline-light w-100" data-bs-toggle="modal" data-bs-target="#registerModal">Registro</button>
      </div>
    </aside>

    <!-- Contenido principal -->
    <main class="console-container w-75">
      <div class="console-header">
        <h4>Aquí empieza todo</h4>
      </div>
      <div class="console-body">
        <p class="text-light">Contenido principal va aquí...</p>
      </div>
    </main>
  </div>

  <!-- Modal Inicio de Sesión -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="console-header">
          <h5 id="loginModalLabel">Inicio de Sesión</h5>
        </div>
        <div class="console-body">
          <form action="{{ route('loginEnter') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
              <span>user@Name:~$</span>
              <input type="text" class="form-control" placeholder="Username" name="name" />
            </div>
            <div class="input-group mb-3">
              <span>user@password:~$</span>
              <input type="password" class="form-control" placeholder="Contraseña" name="password" />
            </div>
            <button type="submit" class="btn btn-success w-100">Acceder</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Registro -->
  <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="console-header">
          <h5 id="registerModalLabel">Registro</h5>
        </div>
        <div class="console-body">
          <form action="{{ route('registerEnter') }}" method="POST">
            @csrf
            <div class="input-group mb-2">
              <span>user@Name:~$</span>
              <input type="text" class="form-control" placeholder="Username" name="username" />
            </div>
            <div class="input-group mb-2">
              <span>user@email:~$</span>
              <input type="email" class="form-control" placeholder="Email" name="email" />
            </div>
            <div class="input-group mb-2">
              <span>user@password:~$</span>
              <input type="password" class="form-control" placeholder="Contraseña" name="password" />
            </div>
            <div class="input-group mb-3">
              <span>user@cpassword:~$</span>
              <input type="password" class="form-control" placeholder="Confirmar contraseña" name="password_confirmation" />
            </div>
            <button type="submit" class="btn btn-success w-100">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
