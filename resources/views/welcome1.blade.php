<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modelo Ajustado</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      html,
        body {
            height: 100%;
            margin: 0;
            background-color: #222;
            color: #ddd;
            font-family: "Source Code Pro", monospace;
        }

        .d-flex {
            height: 100%;
            margin-top: 56px;
            /* espacio para navbar */
        }

        .console-container {
            background-color: #333;
            color: #ddd;
            height: 100%;
            border-right: 2px solid #555;
        }

        .console-header {
            background-color: #bbb;
            padding: 8px 12px;
            border-bottom: 4px solid #bbb;
            text-align: center;
        }

        .console-header h4 {
            margin: 0;
            color: #222;
            font-weight: bold;
        }

        .form-control,
        select {
            background-color: #444;
            color: #ddd;
            border: none;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        .form-control:focus {
            background-color: #555;
            color: #fff;
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
        }

        .btn-submit:hover {
            background-color: #32cd32;
        }

        .form-container {
            width: 90%;
            margin: auto;
            background-color: #333;
            padding: 20px;
        }

        .fixed-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
        }


        .life-bar-container {
            margin-top: 10px;
            text-align: center;
        }

        .life-bar {
            height: 20px;
            width: 100%;
        }

        .gold-text,
        .life-text {
            color: #222;
        }

        .info-box {
            height: 60%;
            margin: 2%;
            overflow-y: auto;
            padding: 10px;
            background-color: #444;
            border-radius: 5px;
            border: 1px solid #555;
        }

        .aside-container {
            width: 250px;
            background-color: #2c2c2c;
            border-left: 2px solid #555;
            padding: 15px;
            text-align: center;
        }

        .aside-container img {
            width: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .aside-container h5 {
            color: lightgreen;
        }

        .navbar-dark {
            background-color: #111;
        }

        .nav-link {
            color: #ddd !important;
        }

        .nav-link:hover {
            color: lightgreen !important;
        }

        .principal {
            overflow-y: auto;
            padding: 15px;
        }

        /* ESTILOS NAVBAR */

        :root {
            --principal: #27c93f;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 10%;
            background-color: #1e1e1e;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            position: sticky;
            top: 0;
            z-index: 1000;
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

        @media (max-width: 992px) {
        .d-flex {
            flex-direction: column !important;
        }

        .console-container {
            width: 100% !important;
            height: auto !important;
            border-right: none;
            border-bottom: 2px solid #555;
        }

        .principal {
            order: 2;
            width: 100%;
            padding: 10px;
        }

        .aside-container {
            order: 3;
            width: 100% !important;
            padding: 10px;
            border-left: none;
            border-top: 2px solid #555;
        }

        nav {
            flex-direction: column;
            align-items: flex-start;
            padding: 1rem;
        }

        nav a {
            margin: 0.5rem 0;
        }

        .form-container {
            width: 100% !important;
        }

        .life-bar-container {
            padding: 0 10px;
        }

        .fixed-button {
            bottom: 10px;
            right: 10px;
        }
    }

    @media (max-width: 576px) {
        nav {
            padding: 0.5rem;
        }

        nav a {
            font-size: 14px;
        }

        .console-header h4,
        .zoneName {
            font-size: 16px;
        }

        .life-bar {
            height: 18px;
        }

        .btn-submit,
        .btn-jugar {
            font-size: 14px;
            padding: 8px;
        }

        .aside-container img {
            width: 80px;
        }
    }

    .navbar-nav .nav-link {
    color: #e0e0e0 !important;
    font-weight: bold;
    position: relative;
}

.navbar-nav .nav-link:hover {
    color: #27c93f !important;
}

.navbar-nav .nav-link::after {
    content: "";
    position: absolute;
    width: 0%;
    height: 2px;
    left: 0;
    bottom: -3px;
    background-color: #27c93f;
    transition: width 0.3s ease-in-out;
}

.navbar-nav .nav-link:hover::after {
    width: 100%;
}

.navbar-toggler {
    border-color: #27c93f;
}

.navbar-toggler:focus {
    box-shadow: none;
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

        /* ===== OPCIÓN 1: Botón Jugar más visible, subido desde abajo a la derecha ===== */
        .fixed-button.jugar {
            position: fixed;
            bottom: 80px; /* Subido para hacerlo más visible */
            right: 20px;
            z-index: 10000;
        }
    
        .btn-jugar {
            background-color: #28a745; /* Verde brillante */
            color: white;
            font-size: 1.5rem;
            padding: 15px 30px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(40, 167, 69, 0.6);
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
    
        .btn-jugar:hover {
            background-color: #218838; /* Verde oscuro */
            box-shadow: 0 8px 16px rgba(33, 136, 56, 0.8);
        }

        /* ===== OPCIÓN 2: Botón Borrar más visible, subido desde abajo a la derecha ===== */

        .fixed-button.borrar {
            position: fixed;
            bottom: 80px; /* Igual que el botón jugar */
            right: 140px; /* Separado para que estén paralelos */
            z-index: 10000;
        }

        .btn-borrar {
            background-color: #dc3545; /* Rojo brillante */
            color: white;
            font-size: 1.5rem;
            padding: 15px 30px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(220, 53, 69, 0.6);
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-borrar:hover {
            background-color: #c82333; /* Rojo oscuro */
            box-shadow: 0 8px 16px rgba(200, 35, 51, 0.8);
        }


        .info-box {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 8px;
            margin-top: 10px;
            color: #fff;
            min-height: 150px;
        }
        /* RESPONSIVE DE BOTONES Y ELIMINACION DE ESPACIOS DEBAJO DE ELLOS */
        /* Contenedor botones: que no deje huecos y sea responsive */
        .d-flex.justify-content-center.gap-4.mt-4 {
            flex-wrap: wrap; /* Permite que los botones bajen a la siguiente fila si no caben */
            gap: 1rem;       /* Separación consistente entre botones */
            justify-content: center; /* Centra los botones en todas las pantallas */
            margin-top: 1rem !important;
        }

        /* Botones: tamaño flexible, sin margenes que generen huecos */
        .btn-jugar,
        .btn-borrar {
        flex: 1 1 150px; /* Crecen y encogen, con mínimo 150px */
            max-width: 300px; /* Opcional, para que no crezcan demasiado */
            margin: 0; /* Sin margen para evitar espacios extra */
            padding: 12px 20px; /* Ajusta el padding para que sean cómodos en móvil */
            box-sizing: border-box;
            white-space: nowrap; /* Para evitar que el texto se rompa en dos líneas */
        }

        /* Ajustes para pantallas muy pequeñas */
        @media (max-width: 480px) {
        .btn-jugar,
        .btn-borrar {
            flex: 1 1 100%; /* Botones en columna a 100% ancho */
            max-width: 100%;
        }
        }

    </style>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
      <div class="container-fluid">
        <!-- Título -->
        <a class="navbar-brand fw-bold" href="#">RPG MINIGAME</a>

        <!-- Hamburguesa a la derecha -->
        <button
          class="navbar-toggler ms-auto border-success"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Enlaces -->
        <div
          class="collapse navbar-collapse justify-content-end"
          id="navbarNav"
        >
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Documentacion</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Sobre nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Mis logros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contacto</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Layout principal -->
    <div class="d-flex" style="margin-top: 0">
      <!-- Barra lateral izquierda -->
      <div class="console-container p-3" style="width: 15%">
        @if (isset($personajes)) @foreach ($personajes as $index => $personaje)
        <button class="botonPJ d-block w-100 mb-2" data-index="{{ $index }}">
          {{ $personaje->nombre }}
        </button>
        @endforeach @endif
        <button class="crear d-block w-100 mb-2">CREAR</button>
        <a
          href="{{ route('logout') }}"
          class="text-white text-decoration-none d-block w-100"
        >
          <button class="btn btn-danger mb-3 w-100">LOGOUT</button>
        </a>
      </div>

      <!-- Contenido principal -->
      <div class="flex-grow-1 console-container principal">
        <!-- Aquí se carga dinámicamente el contenido -->
      </div>


      <!-- Aside con perfil y logros -->
      <div class="aside-container w-20">
        <img src="https://via.placeholder.com/100" alt="Usuario" />
        {{--
        <h5>Nombre Usuario</h5>
        --}}
        <h5 id="nombreUsuario">nombreUsuario</h5>
        <hr />
        <p><strong>Logros:</strong></p>
        <ul class="text-start" style="padding-left: 20px">
          <li>🗡 Derrotó al jefe final</li>
          <li id="dineroPersonaje">waiting...</li>
          <li id="nivelPersonaje">waiting...</li>
        </ul>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @if (isset($personajes))
    <script>
                  document.addEventListener('DOMContentLoaded', function() {
                      const botonesPJ = document.querySelectorAll('.botonPJ');
                      const personajes = @json($personajes);

                      document.querySelector('.crear').addEventListener('click', function() {
                          document.querySelector('.principal').innerHTML = `
                              <div class="console-header"><h4 class="m-0">Crear</h4></div>
                              <div class="form-container">
                                  <form action="{{ route('createPj') }}" method="POST">
                                      @csrf
                                      <div class="mb-3">
                                          <label class="form-label">Nombre</label>
                                          <input type="text" name="nombre" class="form-control">
                                      </div>
                                      <div class="mb-3">
                                          <label class="form-label">Zona</label>
                                          <select name="zona_ID" class="form-control">
                                              @foreach ($spawns as $zona)
                                                  <option value="{{ $zona->id }}">{{ $zona->nombre }}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                      <button type="submit" class="btn-submit">Crear</button>
                                  </form>
                              </div>
                          `;
                          document.querySelector('.jugar').innerHTML = "";
                      });

                      botonesPJ.forEach(boton => {
                          boton.addEventListener('click', function() {
                              const index = boton.getAttribute('data-index');
                              const personaje = personajes[index];

                              document.querySelector('.principal').innerHTML = `
                                <div class="console-header"><h4>${personaje.nombre}</h4></div>
                              <div class="life-bar-container">
                                  <div class="life-bar d-flex position-relative" style="height: 24px; border-radius: 5px; overflow: hidden; margin-top: 5px;">
                                      <div style="background-color: #27c93f; width:${(personaje.HP / personaje.Max_HP) * 100}%;"></div>
                                      <div class="bg-danger" style="width:${((personaje.Max_HP - personaje.HP) / personaje.Max_HP) * 100}%;"></div>
                                      <span class="life-text position-absolute w-100 text-center" style="color: white; font-weight: bold; z-index: 1;">
                                          ${personaje.HP}/${personaje.Max_HP} HP
                                      </span>
                                  </div>
                                 <div class="life-bar d-flex position-relative" style="height: 24px; border-radius: 5px; overflow: hidden; margin-top: 5px;">
                                      <div class="bg-warning" style="width:${(personaje.dinero / 1000) * 100}%;"></div>
                                      <div class="bg-dark" style="width:${((1000 - personaje.dinero) / 1000) * 100}%;"></div>
                                      <span class="life-text position-absolute w-100 text-center" style="color: white; font-weight: bold; z-index: 1;">
                                          ${personaje.dinero} Gold
                                      </span>
                                  </div>
                              </div>


                              <h5 class="text-center pt-3 pb-3 zoneName">Estás en la sala: ${personaje.zona.nombre}</h5>
                                <div class="info-box d-flex justify-content-between">
                                    <div class="col-6 pe-2 border-end">
                                        <p><strong>Descripción:</strong></p>
                                        <p>${personaje.zona.descripcion}</p>
                                    </div>
                                    <div class="col-6 ps-2">
                                        <p><strong>Otro contenido:</strong></p>
                                        <p>Aquí podés poner estadísticas, ítems, enemigos, etc.</p>
                                    </div>
                                </div>
                            `;
      


                            document.querySelector('.principal').insertAdjacentHTML('beforeend', `
                            <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
                                @if(isset($personaje))
                                    <form action="{{ route('play') }}" method="POST" target="_blank">
                                        @csrf
                                        <input type="hidden" name="personaje" value="{{ $personaje->id }}">
                                        <button type="submit" class="btn btn-jugar">JUGAR</button>
                                    </form>
                                
                                    <form action="{{ route('deletePj', $personaje->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="personaje" value="{{ $personaje->id }}">
                                        <button type="submit" class="btn btn-borrar">Eliminar Personaje</button>
                                    </form>
                                @else
                                    <p>No tienes personaje aún. Crea uno para empezar a jugar.</p>
                                @endif
                            </div>
                            `);


                              document.querySelector('#dineroPersonaje').innerHTML = `
                                  <p class="text-white">${personaje.dinero} Gold</p>
                              `;

                              document.querySelector('#nivelPersonaje').innerHTML = `
                              <p class="text-white">${personaje.nivel} lvl</p>`;

                          });
                      });
                  });
    </script>
    @endif

    <footer class="bg-dark text-light pt-5 pb-4">
      <div class="container text-md-left">
        <div class="row text-md-left">
          <!-- Sección 1: Logo y descripción -->
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6
              class="text-uppercase mb-4 fw-bold"
              style="color: var(--principal)"
            >
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
              <a href="#" class="text-reset text-decoration-none">Inicio</a>
            </p>
            <p>
              <a href="#" class="text-reset text-decoration-none"
                >Documentación</a
              >
            </p>
            <p>
              <a href="#" class="text-reset text-decoration-none">Mis logros</a>
            </p>
            <p><a href="#" class="text-reset text-decoration-none">Mapa</a></p>
          </div>

          <!-- Sección 3: Soporte -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 fw-bold">Soporte</h6>
            <p>
              <a href="#" class="text-reset text-decoration-none"
                >Preguntas Frecuentes</a
              >
            </p>
            <p>
              <a href="#" class="text-reset text-decoration-none"
                >Centro de ayuda</a
              >
            </p>
            <p>
              <a href="#" class="text-reset text-decoration-none">Contacto</a>
            </p>
            <p>
              <a href="#" class="text-reset text-decoration-none"
                >Términos y condiciones</a
              >
            </p>
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
              <a href="#" class="text-reset me-3"
                ><i class="bi bi-twitter"></i
              ></a>
              <a href="#" class="text-reset me-3"
                ><i class="bi bi-discord"></i
              ></a>
              <a href="#" class="text-reset me-3"
                ><i class="bi bi-youtube"></i
              ></a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
