<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Nuevo mensaje</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      padding: 20px;
    }
    .container {
      background-color: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    h2 {
      color: #27c93f;
    }
    p {
      line-height: 1.6;
    }
    .label {
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Nuevo mensaje de contacto</h2>
    <p><strong>Nombre:</strong> {{ $nombre }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Asunto:</strong> {{ $asunto }}</p>
    <p><strong>Mensaje:</strong></p>
    <p>{{ $mensaje }}</p>
  </div>
</body>
</html>
