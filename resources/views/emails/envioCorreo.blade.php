<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Nuevo mensaje de contacto</title>
  <style>
    /* Reset */
    body, html {
      margin: 0; padding: 0;
      background: #f7fafc;
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
      color: #222;
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }
    a {
      color: #27c93f;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }

    /* Container */
    .email-wrapper {
      max-width: 620px;
      margin: 50px auto;
      background: linear-gradient(145deg, #ffffff, #f1f5f9);
      border-radius: 14px;
      box-shadow: 0 12px 40px rgba(0,0,0,0.08);
      overflow: hidden;
      border-top: 8px solid #27c93f;
    }

    /* Header */
    .email-header {
      background: #27c93f;
      color: white;
      padding: 28px 35px;
      font-size: 2.2rem;
      font-weight: 800;
      letter-spacing: 0.07em;
      display: flex;
      align-items: center;
      gap: 14px;
      user-select: none;
    }

    /* Icon SVG in header */
    .email-header svg {
      width: 36px;
      height: 36px;
      fill: white;
      flex-shrink: 0;
    }

    /* Body */
    .email-body {
      padding: 40px 45px;
      font-size: 1.12rem;
      line-height: 1.7;
      color: #444;
    }

    /* Labels */
    .label {
      font-weight: 700;
      color: #27c93f;
      margin-bottom: 6px;
      display: inline-block;
      font-size: 1.04rem;
      letter-spacing: 0.03em;
    }

    /* Info rows */
    .info-row {
      margin-bottom: 28px;
    }

    /* Message box */
    .message-box {
      background: #e9f9e9;
      border-radius: 10px;
      padding: 22px 28px;
      color: #2a6b2a;
      font-style: italic;
      box-shadow: inset 0 0 14px rgba(39,201,63,0.12);
      white-space: pre-wrap;
      border-left: 6px solid #27c93f;
      font-size: 1.06rem;
      line-height: 1.6;
      transition: background 0.3s ease;
    }
    .message-box:hover {
      background: #d7f0d7;
    }

    /* Footer */
    .email-footer {
      background: #f3f7fb;
      padding: 18px 45px;
      font-size: 0.9rem;
      color: #999;
      border-top: 1px solid #d9e2ec;
      text-align: center;
      user-select: none;
      letter-spacing: 0.04em;
    }

    /* Responsive */
    @media (max-width: 640px) {
      .email-wrapper {
        margin: 30px 15px;
      }
      .email-body {
        padding: 30px 25px;
        font-size: 1rem;
      }
      .email-header {
        font-size: 1.8rem;
        padding: 22px 25px;
        gap: 10px;
      }
      .email-footer {
        padding: 15px 25px;
        font-size: 0.85rem;
      }
    }
  </style>
</head>
<body>
  <div class="email-wrapper" role="main" aria-label="Nuevo mensaje de contacto">
    <header class="email-header">
      <!-- Mail Icon SVG -->
      <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false" role="img">
        <path d="M2.01 6.5l9.99 6.5 9.99-6.5v11H2.01v-11zm0-2.5h20v-2H2.01v2z"></path>
      </svg>
      NUEVO MENSAJE DE CONTACTO
    </header>
    <section class="email-body">
      <div class="info-row">
        <span class="label">Nombre:</span><br />
        <span>{{ $nombre }}</span>
      </div>
      <div class="info-row">
        <span class="label">Correo electrónico:</span><br />
        <a href="mailto:{{ $email }}">{{ $email }}</a>
      </div>
      <div class="info-row">
        <span class="label">Asunto:</span><br />
        <span>{{ $asunto }}</span>
      </div>
      <div class="info-row">
        <span class="label">Mensaje:</span>
        <div class="message-box" tabindex="0" aria-label="Contenido del mensaje">
          {{ $mensaje }}
        </div>
      </div>
    </section>
    <footer class="email-footer">
      Mensaje enviado desde el formulario de contacto de tu sitio web.
    </footer>
  </div>
</body>
</html>
