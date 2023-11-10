<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>admin</title>
</head>

<body>
<style>
    *{
        
    }
</style>

    <div class="table table-striped-columns">
        <div class="row align-items-center">
            <div class="col">
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
                            <td><?php echo $bebida['tipo_id']; ?></td>
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
        </div>
    </div>
</body>

</html>