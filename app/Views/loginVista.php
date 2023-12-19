<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesion</title>

    <link href="<?php echo base_url("css/bootstrap.min.css") ?>" rel="stylesheet">
    <script src="<?php echo base_url("js/bootstrap.bundle.min.js") ?>"></script>
</head>


<body>
    <form method='post' action="<?php base_url('crud') ?>">
        <h2 class="fw-bold text-center py-5">Bienvenido</h2>
        <style>
            body {
                background: linear-gradient(to right, #ffa345, #ffe259);
            }
        </style>
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body card-center">
                            <h1 class="card-title text-center">Iniciar Sesion</h1>
                            <form method='post' action="<?php base_url('crud') ?>">
                                <div class="col bg d-done de-lg-block col-md-5 col-lg-5 col-xl-6"></div>
                                <div class="mb-4">
                                    <label for="email" class="form-label" required="">Correo Electronico</label>
                                    <input type="email" name="email" required class="form-control" id="email"
                                        aria-describedby="input de email">
                                    <div id="emailHelp" class="form-text text-dark">Ingrese su Correo Electronico</div>
                                </div>

                                <div class="mb-4">
                                    <label for="contrasena" class="form-label" required="">Contraseña</label>
                                    <input type="password" name="contrasena" required class="form-control "
                                        id="exampleInputPassword1">
                                    <div class="form-text text-dark">ingrese su contraseña</div>
                                </div>
                                <div class="">

                                    <button href="<?= base_url('ingreso') ?>" class="btn btn-primary">ingresar</button>
                                </div>

                                <div class="my_3">
                                    <span>No tienes cuenta? <a href="<?= site_url("register") ?>">Registrate</a></span>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <script src="<?php echo base_url("js/popper.min.js") ?>"></script>
        <script src="<?php echo base_url("js/bootstrap.min.js") ?>"></script>

    </form>
</body>

</html>