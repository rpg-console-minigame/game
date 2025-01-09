<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modelo Ajustado</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Aplicando los estilos del modal */
    html, body {
      height: 100%;
      margin: 0;
      background-color: #222;
      color: #ddd;
      font-family: "Source Code Pro", monospace;
    }

    .full-height {
      height: 100%;
    }

    .console-container {
      border: 4px solid #bbb;
      background-color: #222;
      color: #ddd;
    }

    .console-header {
      background-color: #bbb;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 8px 12px;
      border-bottom: 4px solid #bbb;
    }

    .console-header h4 {
      margin: 0;
      color: #222;
      font-weight: bold;
    }

    .btn-outline-light {
      color: #ddd;
      border-color: #ddd;
    }

    .btn-outline-light:hover {
      background-color: #bbb;
      color: #222;
    }

    .border {
      border-color: #bbb !important;
    }

    .btn-jugar {
      font-weight: bold;
      width: 40vw;
      max-width: 200px;
    }

    .fixed-button {
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 9999;
    }

    .bg-success {
      background-color: lightgreen !important;
    }

    .bg-danger {
      background-color: red !important;
    }

    .hp-info {
      text-align: center;
    }

    .info-box {
      border: 4px solid #bbb;
      padding: 15px;
      margin-top: 15px;
    }
  </style>
</head>
<body>
  <div class="d-flex full-height">
    <!-- Barra lateral -->
    <div class="w-25 console-container p-3">
      <button class="btn btn-outline-light mb-3 w-100">PJ1</button>
      <button class="btn btn-outline-light mb-3 w-100">PJ2</button>
      <button class="btn btn-outline-light mb-3 w-100">PJ3</button>
      <button class="btn btn-outline-light w-100">CREAR</button>
    </div>

    <!-- Contenido principal -->
    <div class="w-75 console-container mx-auto">
      <div class="console-header">
        <h4>Nombre</h4>
        <div class="bg-success mx-2" style="height: 20px; width: 9%;"></div>
        <div class="bg-danger" style="height: 20px; width: 1%;"></div>
      </div>
      <div class="hp-info">
        <p>90/100 HP</p>
        <p>99999 G</p>
      </div>
      <hr class="border">
      <h5 class="text-center">Zona 1</h5>
      <p class="text-center">Nivel 1</p>
      <div class="info-box">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum pariatur ducimus atque delectus iusto provident beatae tenetur dolor odit quod? Nam inventore aliquid aspernatur magni consectetur. Harum sed quis distinctio.
      </div>
    </div>
  </div>

  <!-- Botón jugar -->
  <div class="fixed-button">
    <button class="btn btn-success btn-jugar">JUGAR</button>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
