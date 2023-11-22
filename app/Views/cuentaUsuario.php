<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo base_url('css/usuario.css') ?>">
    <title>Usuario</title>
</head>

<body>


    <div class="container">
        <section>
            <h2>Bienvenido,<?php echo $user['nombre']; ?></h2>
            <h3>Datos del Usuario</h3>
            <div class="card">
                <div class="card-body">
                    <table>
                        <tr>
                            <th>Nombre</th>
                            <td><?php echo $user['nombre']; ?></td>
                        </tr>
                        <tr>
                            <th>Correo Electronico</th>
                            <td><?php echo $user['email']; ?></td>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <td><?php echo $user['id']; ?></td>
                        </tr>
                        <tr>
                            <th>Rol</th>
                            <td><?php echo $user['rol']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>


        </section>
    </div>
</body>

</html>