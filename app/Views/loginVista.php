<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesion</title>

    <link href="<?php echo base_url("css/bootstrap.min.css") ?>" rel="stylesheet">
    <script src="<?php echo base_url("js/bootstrap.bundle.min.js") ?>"></script>
</head>
<form method='post' action="<?php base_url('login') ?>">
    <h2 class="fw-bold text-center py-5">Bienvenido</h2>

    <body class="m-0 vh-100 row justify-content-center align-item-center">
        <style>
            body {
                background: #ffe;
                background: linear-gradient(to right,#ffa345,#ffe259);
            }

            
        </style>
        <div class="container w-75 bg-white p-5  mt-5 rounded-end">
            <div class="row align-items-stretch">
                <div class="col bg d-done de-lg-block col-md-5 col-lg-5 col-xl-6"></div>
                <div class="mb-4">
                    <label for="email" class="form-label" required="">Correo Electronico</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="input de email">
                    <div id="emailHelp" class="form-text text-white">Ingrese su Correo Electronico</div>
                </div>

                <div class="mb-4">
                    <label for="contrasena" class="form-label" required="">Contraseña</label>
                    <input type="password" name="contrasena" class="form-control " id="exampleInputPassword1">
                    <div class="text-white">ingrese su contraseña</div>
                </div>
                <div class="d-grid">
                <button type="submit" class=" rounded col-bg">Submit</button>
                </div>
                <div class="my_3">
                    <span>no tienes cuenta? <a href="<?= site_url("register") ?>">Registrate</a></span>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url("js/popper.min.js") ?>"></script>
        <script src="<?php echo base_url("js/bootstrap.min.js") ?>"></script>

</form>
</body>

</html>