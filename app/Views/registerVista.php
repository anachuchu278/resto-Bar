<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesion</title>

    <link href="<?php echo base_url("css/bootstrap.min.css") ?>" rel="stylesheet">
    <script src="<?php echo base_url("js/bootstrap.bundle.min.js") ?>"></script>
</head>
<form method='post' action="<?php base_url('register')?>">
<body>
    <div class='container mt-5'>
        <div class='row justify-content-center'>
            <div class='col-md-6'>
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center">Registro de Usuario</h1>
                        <form method='post' action="<?php base_url('register')?>">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input name="name" type="text" required class="form-control" id="name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input name="email" type="email" required class="form-control" id="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input name="password" type="password" required class="form-control" id="exampleInputPassword1">
                            </div>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</form>
</html>