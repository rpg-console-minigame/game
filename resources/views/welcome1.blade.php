<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modelo Ajustado</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    html, body {
      height: 100%;
      margin: 0;
      background-color: #222;
      color: #ddd;
      font-family: "Source Code Pro", monospace;
    }

    .console-container {
      border: 4px solid #bbb;
      background-color: #333;
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

    .form-control {
      background-color: #444;
      color: #ddd;
      border: none;
      border-radius: 4px;
      margin-bottom: 15px;
      font-family: "Source Code Pro", monospace;
    }

    .form-control:focus {
      background-color: #555;
      color: #fff;
      outline: none;
      box-shadow: none;
    }

    .btn-submit {
      background-color: lightgreen;
      color: #222;
      font-weight: bold;
      border: none;
      border-radius: 4px;
      width: 100%;
      padding: 10px;
      font-family: "Source Code Pro", monospace;
    }

    .btn-submit:hover {
      background-color: #32cd32;
    }

    .input-label {
      color: #ddd;
      margin-bottom: 5px;
      font-family: "Source Code Pro", monospace;
    }

    .form-container {
      width: 400px;
      margin: auto;
      border: 4px solid #bbb;
      border-radius: 8px;
      background-color: #333;
      padding: 20px;
      margin-top: 50px;
    }

    .fixed-button {
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 9999;
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
      </div>
      <div class="form-container">
        
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
