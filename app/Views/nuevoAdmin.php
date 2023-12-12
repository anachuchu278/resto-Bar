<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/admin.css'); ?>">


    <link rel="shortcut icon" href="../img/logo.png">

    <title>Crear Admin</title>
</head>
<body>
    

<div class="container">
    <form class="container-item" action="<?= site_url('nuevo'); ?>" method="post">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('errors')) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>


        <div class="form-group">
            <div class="container-panel">
                <p class="panel">Panel <a href=<?= site_url('adminBebidas'); ?> id="style-2" data-replace="Entrar"><span>Admin</span></a></p>
                </div>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control">
                    <?php if (isset($validation) && $validation->getError('nombre')) : ?>
                        <div class="error-message"><?= $validation->getError('nombre') ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" name="email" class="form-control">
                    <?php if (isset($validation) && $validation->getError('email')) : ?>
                        <div class="error-message"><?= $validation->getError('email') ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="contraseña">Contraseña</label>
                    <input type="password" name="contraseña" class="form-control">
                    <?php if (isset($validation) && $validation->getError('contrasena')) : ?>
                        <div class="error-message"><?= $validation->getError('contrasena') ?></div>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn btn-primary">Agregar Cuenta</button>
            </form>
        <div class="container-panel">
    </div>
</div>