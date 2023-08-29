<!DOCTYPE html>
<html>
<head>
    <title>Bar - Administrador de Bebidas</title>
    <link rel="stylesheet" href="<?php echo base_url('css/index.css'); ?>">
</head>
<body>
    <header>
        <div class="container">
            <h1>Bar - Administrador de Bebidas</h1>
        </div>
    </header>

    <nav>
        <div class="container">
            <ul>
                <li><a href="<?php echo base_url('barControlador'); ?>">Inicio</a></li>
               
            </ul>
        </div>
    </nav>

    <div class="container">
        <section>
            <h2>Bebidas</h2>
            <a href="<?php echo base_url('adminBebidas/agregar'); ?>" class="btn btn-primary">Agregar Bebida</a>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($bebidas as $bebida): ?>
                    <tr>
                        <td><?php echo $bebida['nombre']; ?></td>
                        <td><?php echo $bebida['tipo']; ?></td>
                        <td><?php echo $bebida['precio']; ?></td>
                        <td>
                            <a href="<?php echo base_url('adminBebidas/editar/' . $bebida['id_bebida']); ?>" class="btn btn-secondary">Editar</a>
                            <a href="<?php echo base_url('adminBebidas/eliminar/' . $bebida['id_bebida']); ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>
    </div>
</body>
</html>