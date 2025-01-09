<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modelo Ajustado</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    html, body {
      height: 100%; 
    }
    .full-height {
      height: 100%;
    }
  </style>
</head>
<body class="bg-light">
  <!-- Div izquierdo (Botones y Datos del Jugador) -->
  <div class="d-flex bg-secondary text-white p-3 full-height">
    <!-- Columna de botones -->
    <div class="w-25 pe-3">
      <button class="btn btn-outline-light mb-3 w-100">PJ1</button>
      <button class="btn btn-outline-light mb-3 w-100">PJ2</button>
      <button class="btn btn-outline-light mb-3 w-100">PJ3</button>
      <button class="btn btn-outline-light w-100">CREAR</button>
    </div>

    
    <div class="w-75 bg-white text-dark p-3 border mx-auto">
      <div class="d-flex justify-content-center">
        <h4 class="text-center" style="transform: translateX(-40px);">Nombre</h4>
      </div>
      <p class="text-end">90/100 HP</p>
      <p class="text-center">99999 G</p>
      <hr>
      <h5 class="text-center">Zona 1</h5>
      <p class="text-center">Nivel 1</p>
    
      <p>
        <div class="border border-2 border-dark p-3">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum pariatur ducimus atque delectus iusto provident beatae tenetur dolor odit quod? Nam inventore aliquid aspernatur magni consectetur. Harum sed quis distinctio.
        </div>
      </p>
    
      <div class="d-flex justify-content-center">
        <button class="btn btn-success w-50">JUGAR</button>
      </div>
    </div>
    
    
  </div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
