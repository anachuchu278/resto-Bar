<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo base_url('css/usuario.css') ?>">
    <title>Usuario</title>
</head>

<body>


    <div class="container">
            <section>
                <h2>Bienvenido,<?php echo $user['nombre'];?></h2>   
                <table>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo Electronico</th>
                        <th>ID</th>
                        <th>Rol</th>
                    </tr>
                    
                        <tr>
                            <td scope='col'><?php echo $user['nombre']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['rol']; ?></td>
                        </tr>
                    
                </table>
            </section>
    </div>
</body>

</html>