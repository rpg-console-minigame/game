<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modelo Ajustado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            margin-top: 56px; /* espacio para navbar */
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
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Mi Juego</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="#">Inicio</a>
                    <a class="nav-link" href="#">Sobre Nosotros</a>
                    <a class="nav-link" href="#">Mis Logros</a>
                    <a class="nav-link" href="#">Contacto</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Layout principal -->
    <div class="d-flex">
        <!-- Barra lateral izquierda -->
        <div class="w-25 console-container p-3">
            @if (isset($personajes))
                @foreach ($personajes as $index => $personaje)
                    <button class="btn btn-outline-light mb-3 w-100 botonPJ"
                        data-index="{{ $index }}">{{ $personaje->nombre }}</button>
                @endforeach
            @endif
            <button class="btn btn-outline-light mb-3 w-100 crear">CREAR</button>
            <a href="{{ route('logout') }}" class="text-white text-decoration-none">
                <button class="btn btn-danger mb-3 w-100">LOGOUT</button>
            </a>
        </div>

        <!-- Contenido principal -->
        <div class="flex-grow-1 console-container principal">
            <!-- Aquí se carga dinámicamente el contenido -->
        </div>

        <!-- Aside con perfil y logros -->
        <div class="aside-container">
            <img src="https://via.placeholder.com/100" alt="Usuario">
            <h5>Nombre Usuario</h5>
            <hr>
            <p><strong>Logros:</strong></p>
            <ul class="text-start" style="padding-left: 20px;">
                <li>🗡 Derrotó al jefe final</li>
                <li>💰 Consiguió 1000G</li>
                <li>🎖 Nivel 10 alcanzado</li>
            </ul>
        </div>
    </div>

    <!-- Botón de jugar -->
    <div class="fixed-button jugar"></div>

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
                            <h5 class="text-center pt-3 pb-3 zoneName">${personaje.zona.nombre}</h5>
                            <div class="info-box">
                                <p>${personaje.zona.descripcion}</p>
                            </div>
                            <div class="life-bar-container">
                                <div class="life-bar d-flex">
                                    <div class="bg-success" style="width:${(personaje.HP / personaje.Max_HP) * 100}%;"></div>
                                    <div class="bg-danger" style="width:${((personaje.Max_HP - personaje.HP) / personaje.Max_HP) * 100}%;"></div>
                                </div>
                                <p class="life-text">${personaje.HP}/${personaje.Max_HP} HP</p>
                                <p class="gold-text">${personaje.dinero} G</p>
                            </div>
                        `;

                        document.querySelector('.jugar').innerHTML = `
                            <form action="{{ route('play') }}" method="POST">
                                @csrf
                                <input type="hidden" name="personaje" value="${personaje.id}">
                                <button type="submit" class="btn btn-success btn-jugar">JUGAR</button>
                            </form>
                        `;
                    });
                });
            });
        </script>
    @endif
</body>

</html>
