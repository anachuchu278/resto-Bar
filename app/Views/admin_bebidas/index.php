<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo base_url('css/index.css') ?>">
    <title>admin</title>
</head>

<body>


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
                    
                    <?php foreach ($bebidas as $bebida) : ?>
                        <tr>
                            <td scope='col'><?php echo $bebida['nombre']; ?></td>
                            <td><?php echo $bebida['id_tipo']; ?></td>
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