<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modelo Ajustado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Asegurando que la página ocupe todo el espacio disponible */
        html,
        body {
            height: 100%;
            margin: 0;
            background-color: #222;
            color: #ddd;
            font-family: "Source Code Pro", monospace;
        }

        /* Contenedor que se ajusta al 100% del alto y ancho de la pantalla */
        .d-flex {
            height: 100%;
        }

        .console-container {
            border: 4px solid #bbb;
            background-color: #333;
            color: #ddd;
            height: 100%;
        }

        .console-header {
            background-color: #bbb;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 8px 12px;
            border-bottom: 4px solid #bbb;
        }

        .console-header h4 {
            margin: 0;
            color: #222;
            font-weight: bold;
            text-align: center;
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

        .console-header .d-flex p {
            margin-top: 4px;
        }

        .w-75 {
            height: 100%;
        }

        .life-bar-container {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
            /* Ajuste para separar el nombre y la barra */
        }

        .life-bar {
            width: 25%;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .life-bar .bg-success {
            width: 90%;
            height: 20px;
        }

        .life-bar .bg-danger {
            width: 10%;
            height: 20px;
        }

        .life-text {
            margin-top: 5px;
            font-size: 14px;
        }

        .gold-text {
            margin-left: 3%;
            font-size: 14px;
            color: #ddd;
        }

        .gold-text {
            padding-top: 5%;
            margin-left: 3%;
            font-size: 14px;
            color: #ddd;
            display: flex;
            /* Usa flexbox para controlar alineación */
            align-items: center;
        }

        .gold-unit {
            margin-left: 0.1rem;
            vertical-align: baseline;
        }

        .info-box {
            max-height: 355px;
            /* Ajusta la altura máxima según lo que necesites */
            overflow-y: auto;
            padding: 10px;
            background-color: #444;
            /* Opcional: un fondo diferente para mayor contraste */
            border-radius: 5px;
            /* Opcional: bordes redondeados */
            border: 1px solid #555;
            /* Opcional: borde para separar visualmente */
        }
    </style>
</head>

<body>
    <div class="d-flex">
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
                <!-- Nombre centrado -->
                <h4 class="m-0">Nombre</h4>
                <div class="life-bar-container">
                    <!-- Barra de vida -->
                    <div class="life-bar d-flex justify-content-between align-items-center">
                        <div class="d-flex" style="width: 100%; height: 20px; justify-content: center;">
                            <div class="bg-success"></div>
                            <div class="bg-danger"></div>
                        </div>
                        <!-- Cantidad de oro -->
                        <p class="gold-text text-dark">
                            99999 <span class="gold-unit">G</span>
                        </p>
                    </div>
                    <!-- Texto de vida -->
                    <p class="life-text text-dark">90/100 HP</p>
                </div>
            </div>
            <h5 class="text-center pt-3 pb-3">Zona 1</h5>
            <div class="info-box">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum pariatur ducimus atque delectus iusto
                provident beatae tenetur dolor odit quod? Nam inventore aliquid aspernatur magni consectetur. Harum sed
                quis distinctio.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum pariatur ducimus atque delectus iusto
                provident beatae tenetur dolor odit quod? Nam inventore aliquid aspernatur magni consectetur. Harum sed
                quis distinctio.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum pariatur ducimus atque delectus iusto
                provident beatae tenetur dolor odit quod? Nam inventore aliquid aspernatur magni consectetur. Harum sed
                quis distinctio.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum pariatur ducimus atque delectus iusto
                provident beatae tenetur dolor odit quod? Nam inventore aliquid aspernatur magni consectetur. Harum sed
                quis distinctio.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum pariatur ducimus atque delectus iusto
                provident beatae tenetur dolor odit quod? Nam inventore aliquid aspernatur magni consectetur. Harum sed
                quis distinctio.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum pariatur ducimus atque delectus iusto
                provident beatae tenetur dolor odit quod? Nam inventore aliquid aspernatur magni consectetur. Harum sed
                quis distinctio.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum pariatur ducimus atque delectus iusto
                provident beatae tenetur dolor odit quod? Nam inventore aliquid aspernatur magni consectetur. Harum sed
                quis distinctio.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum pariatur ducimus atque delectus iusto
                provident beatae tenetur dolor odit quod? Nam inventore aliquid aspernatur magni consectetur. Harum sed
                quis distinctio.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum pariatur ducimus atque delectus iusto
                provident beatae tenetur dolor odit quod? Nam inventore aliquid aspernatur magni consectetur. Harum sed
                quis distinctio.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum pariatur ducimus atque delectus iusto
                provident beatae tenetur dolor odit quod? Nam inventore aliquid aspernatur magni consectetur. Harum sed
                quis distinctio.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum pariatur ducimus atque delectus iusto
                provident beatae tenetur dolor odit quod? Nam inventore aliquid aspernatur magni consectetur. Harum sed
                quis distinctio.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum pariatur ducimus atque delectus iusto
                provident beatae tenetur dolor odit quod? Nam inventore aliquid aspernatur magni consectetur. Harum sed
                quis distinctio.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum pariatur ducimus atque delectus iusto
                provident beatae tenetur dolor odit quod? Nam inventore aliquid aspernatur magni consectetur. Harum sed
                quis distinctio.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum pariatur ducimus atque delectus iusto
                provident beatae tenetur dolor odit quod? Nam inventore aliquid aspernatur magni consectetur. Harum sed
                quis distinctio.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum pariatur ducimus atque delectus iusto
                provident beatae tenetur dolor odit quod? Nam inventore aliquid aspernatur magni consectetur. Harum sed
                quis distinctio.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum pariatur ducimus atque delectus iusto
                provident beatae tenetur dolor odit quod? Nam inventore aliquid aspernatur magni consectetur. Harum sed
                quis distinctio.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum pariatur ducimus atque delectus iusto
                provident beatae tenetur dolor odit quod? Nam inventore aliquid aspernatur magni consectetur. Harum sed
                quis distinctio.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum pariatur ducimus atque delectus iusto
                provident beatae tenetur dolor odit quod? Nam inventore aliquid aspernatur magni consectetur. Harum sed
                quis distinctio.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum pariatur ducimus atque delectus iusto
                provident beatae tenetur dolor odit quod? Nam inventore aliquid aspernatur magni consectetur. Harum sed
                quis distinctio.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum pariatur ducimus atque delectus iusto
                provident beatae tenetur dolor odit quod? Nam inventore aliquid aspernatur magni consectetur. Harum sed
                quis distinctio.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum pariatur ducimus atque delectus iusto
                provident beatae tenetur dolor odit quod? Nam inventore aliquid aspernatur magni consectetur. Harum sed
                quis distinctio.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum pariatur ducimus atque delectus iusto
                provident beatae tenetur dolor odit quod? Nam inventore aliquid aspernatur magni consectetur. Harum sed
                quis distinctio.
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
