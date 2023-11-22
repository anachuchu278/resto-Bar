<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registro</title>

    <link href="<?php echo base_url("css/bootstrap.min.css") ?>" rel="stylesheet">
    <script src="<?php echo base_url("js/bootstrap.bundle.min.js") ?>"></script>
</head>
<form method='post' action="<?php base_url('registro')?>">
<body>
<style>
        body {
            background: linear-gradient(to right, #FCEFEF, #bbb7af);
        }

        .card-center {
            margin-top: 5%;
        }

        .form-text {
            color: white;
        }

        .btn-ingresar {
            background-color: (to right, #ffa345, #ffe259);
            color: white;
        }
    </style>
    <div class='container mt-5'>
        <div class='row justify-content-center'>
            <div class='col-md-6'>
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center">Registro de Usuario</h1>
                        <form method='post' action="<?php base_url('registro')?>">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input name="nombre" type="text" required class="form-control" id="name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input name="email" type="email" required class="form-control" id="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input name="contrasena" type="password" required class="form-control" id="exampleInputPassword1">
                            </div>
                            <button type="submit" class="rounded col-bg" href="<?php base_url('registro')?>">Registrar</button>
                            
                            <div class="my_3">
                                <span> Ya tienes cuenta? <a href="<?= site_url("login") ?>">Inicia Sesion</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</form>
</html>