<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesion</title>

    <link href="<?php echo base_url("css/bootstrap.min.css") ?>" rel="stylesheet">
    <script src="<?php echo base_url("js/bootstrap.bundle.min.js") ?>"></script>
</head>
<form method='post' action="<?php base_url('login')?>">
<body class="m-0 vh-100 row justify-content-center aling-item-center">
    <div class='col-xxl-8 col-lg-8 col-md-8 col-sm-12 mt-5'>
        <div class='login-container'>
            <div class='container'>
                <div class="mh-100 row">
                    <div class="">
                        <label for="email" class="form-label" required="">Correo Electronico</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="input de email">
                        <div id="emailHelp" class="form-text text-white">Ingrese su Correo Electronico</div>
                    </div>
                    <div class="">
                        <label for="password" class="form-label" required="">Contraseña</label>
                        <input type="password" name="password" class="form-control " id="exampleInputPassword1">
                        <div class="text-white">ingrese su contraseña</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url("js/popper.min.js") ?>"></script>
    <script src="<?php echo base_url("js/bootstrap.min.js") ?>"></script>
</body>
</form>
</html>
//