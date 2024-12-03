<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        /* body {
            background-color: #6c757d;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        } */
        
        .console-controls span {
            display: inline-block;
            width: 12px;
            height: 12px;
        }
        .yellow { background-color: #ffc107; }
        .green { background-color: #28a745; }
        .red { background-color: #dc3545; }
        .grisClaro{background-color: darkgray;}
        .verde{color: lightgreen;}

        /* .form-control, .form-select {
            background-color: #495057;
            border: none;
            color: #f8f9fa;
        } */
        .separar {
            border: none;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center h-full bg-secondary">
    <!-- <section class="bg-danger border border-3 border-dark text-light position-absolute top-50 start-50 translate-middle text-center p-4 rounded">
        <div class="position-absolute top-50 start-50 translate-middle bg-dark border border-5 border-secondary z-0 position-absolute">
        <div class="container-fluid z-1 border border-3 border-dark d-flex">
            <h1>Register</h1>
            <form class="mr-3" action="#" method="POST">
                <label for="email">user@Name:~$</label>
                <input type="email" id="email" name="email" placeholder="UserName" required>

                <label for="password">user@email:~$</label>
                <input type="password" id="password" name="password" placeholder="Email" required>

                <label for="email">user@password:~$</label>
                <input type="email" id="email" name="email" placeholder="Contraseña" required>

                <label for="email">user@cpassword:~$</label>
                <input type="email" id="email" name="email" placeholder="Confirmar contraseña" required>

                <button type="submit" class="login-btn">Registrarse</button>
            </form>
        </div>
        </div>
        
    </section> -->
    <div class=" border border-radius p-2 w-full max-w-max bg-dark">
        
        <div class=" d-flex justify-content-between align-items-center mb-3">
            <h5 class="text-light">Incio de Sesión</h5>
            <div class="console-controls w-25 h-25 d-inline-block">
                <span class="yellow w-0 h-0 d-inline-block"></span>
                <span class="green w-0 h-0 d-inline-block"></span>
                <span class="red w-0 h-0 d-inline-block"></span>
            </div>
        </div>

        <form action="{{ route('loginEnter') }}" method="POST">
            @csrf
            <div class="separar bg-transparent mb-3">
                <span class="separar verde bg-transparent ">user@Name:~$</span>
                <input type="text" class=" border border-0 grisClaro" placeholder="Username" name="name">
            </div>
            
            <div class="separar bg-transparent mb-3">
                <span class="separar verde bg-transparent">user@password:~$</span>
                <input type="password" class="border border-0 grisClaro" placeholder="Contraseña" name="password">
            </div>
            
            
            <button type="submit" class="btn btn-success w-100">Acceder</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>