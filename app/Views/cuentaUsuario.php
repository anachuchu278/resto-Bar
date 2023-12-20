<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo base_url('css/usuario.css') ?>">
    <title>Usuario</title>
</head>

<body>


    <div class="container">
        <section>
            <h2 class="section-title">Bienvenido,
                <?php echo $user['nombre_usuario']; ?>
            </h2>
            <h3 class="section-subtitle">Datos del Usuario</h3>
            <div class="card">
                <div class="card-body">
                    <table class="user-table">
                        <tr>
                            <th>Nombre</th>
                            <td>
                                <?php echo $user['nombre_usuario']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Correo Electrónico</th>
                            <td>
                                <?php echo $user['email']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <td>
                                <?php echo $user['id_usuario']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Rol</th>
                            <td>
                                <?php echo $user['rol']; ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
    </div>

</body>

</html>