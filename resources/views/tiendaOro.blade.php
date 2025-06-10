<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tienda de Oro - RPG Minigame</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <script
        src="https://www.paypal.com/sdk/js?client-id={{ config('paypal.client_id') }}&currency={{ config('paypal.currency') }}&intent=capture">
    </script>

    <style>
        html {
            scroll-behavior: smooth;
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            height: 100%;
            margin: 0;
            padding: 0;
            background: linear-gradient(rgb(25, 52, 25), rgb(143, 255, 158));
            background-attachment: fixed;
        }

        :root {
            --principal: rgb(143, 255, 158);
        }

        * {
            font-family: "Source Code Pro", monospace;
            box-sizing: border-box;
        }

        /* Barra de navegación */
        nav {
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            height: 10vh;
            min-height: fit-content;
        }

        nav a {
            margin: 0 1rem;
            text-decoration: none;
            color: whitesmoke;
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
            background-color: whitesmoke;
            transition: width 0.3s ease-in-out;
        }

        nav a:hover::after {
            width: 100%;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        button {
            padding: 6px 16px;
            border: 2px solid var(--principal);
            border-radius: 24px;
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

        .gold-card {
            background-color: #1f1f1f;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 0 8px rgba(0, 255, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: transform 0.3s ease;
        }

        .gold-card:hover {
            transform: translateY(-5px);
        }

        .gold-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .gold-icon {
            font-size: 2.5rem;
            color: var(--principal);
            margin-right: 1.5rem;
        }

        .gold-info h5 {
            margin: 0;
            color: #fff;
            font-weight: bold;
        }

        .gold-info p {
            margin: 0.25rem 0 0;
            color: #ccc;
        }

        .store-container {
            padding: 4rem 1rem;
            margin: 2rem auto;
            max-width: 1140px;
            /* más ancho para permitir dos columnas */
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
            .gold-card {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
                gap: 1rem;
            }

            footer .row>div {
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
            footer .row>div {
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
    <nav class="navbar navbar-expand-lg px-4 py-3">
        <div class="container-fluid">
            <!-- Marca a la izquierda -->
            <a href="{{ route('welcome') }}">CONSOLE MINIGAME</a>

            <!-- Hamburguesa a la derecha -->
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menú colapsable -->
            <div class="collapse navbar-collapse justify-content-between" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a href="{{ route('sobreNosotros') }}">Sobre nosotros</a></li>
                    <!-- <li class="nav-item"><a href="#">Mis logros</a></li> -->
                    <li class="nav-item"><a href="{{ route('contacto') }}">Contacto</a></li>
                    <li class="nav-item"><a href="{{ route('map') }}">Mapa</a></li>
                    <li class="nav-item"><a href="{{ route('tiendaOro') }}">Tienda</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="store-container m-3">
            <h2 class="text-center text-white mb-5" style="color: var(--principal);">Tienda de Oro</h2>

            <div class="row">
                @foreach ($tienda as $item)
                    <div class="col-md-6 mb-4">
                        <div class="gold-card">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-coin gold-icon"></i>
                                <div class="gold-info">
                                    <h5>{{ $item->nombre }}</h5>
                                    <p>{{ $item->cantidad_oro }} monedas de oro</p>
                                </div>
                            </div>
                            <div>
                                <p class="mb-2 fw-bold text-white">{{ $item->precio }} €</p>
                                <div class="paypal-button" id="paypal-button-{{ $item->id }}"
                                    data-id="{{ $item->id }}" data-amount="{{ $item->precio }}">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    <!-- PAYPAL SCRIPT -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll(".paypal-button").forEach((el) => {
                const itemId = el.dataset.id;
                const amount = el.dataset.amount;

                paypal.Buttons({
                    createOrder: function() {
                        return fetch("/paypal/create", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-Token": "{{ csrf_token() }}"
                                },
                                body: JSON.stringify({
                                    amount: amount
                                })
                            })
                            .then(res => res.json())
                            .then(data => {
                                return data
                                    .orderID; // ✅ el backend debe devolver { orderID: '...' }
                            });
                    },
                    onApprove: function(data) {
                        return fetch("/paypal/complete", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-Token": "{{ csrf_token() }}"
                                },
                                body: JSON.stringify({
                                    orderID: data.orderID
                                })
                            })
                            .then(res => res.json())
                            .then(details => {
                                alert("¡Gracias por tu compra!");
                                // Aquí podrías redirigir o actualizar la página
                            });
                    },
                    onError: function(err) {
                        console.error("PayPal Error", err);
                        alert("Hubo un problema con el pago.");
                    }
                }).render(`#paypal-button-${itemId}`);
            });
        });
    </script>


    <!-- FOOTER -->
    <footer class="bg-dark text-light pt-5 pb-4 mt-auto">
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
                    <p><a href="{{ route('sobreNosotros') }}" class="text-reset text-decoration-none">Sobre
                            Nosotros</a>
                    </p>
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
                        soporte@rpgminigame.com
                    </p>
                    <p> github.com/rpgminigame</p>
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
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
