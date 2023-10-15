<!DOCTYPE html>
<html>
<head>
    <title>Bar - Menú</title>
    <link rel="stylesheet" href="<?php echo base_url('css/bebidasVista.css'); ?>">
</head>
<body>
    <header class="bg-dark text-white">
        <div class="container py-3">
            <h1>Bar - Menú</h1>
        </div>
    </header>

    <nav class="bg-dark">
        <div class="container">
            <ul class="navbar">
                <li class="navbar-item"><a class="navbar-link" href="<?php echo base_url('barControlador'); ?>">Inicio</a></li>
                
            </ul>
        </div>
    </nav>

    <div class="container py-4">
        <section>
            <h2>Bebidas Disponibles:</h2>
            <ul class="list-group">
                <?php foreach ($bebidas as $bebida): ?>
                    <li class="list-group-item">
                        <strong>Nombre:</strong> <?php echo $bebida['nombre']; ?><br>
                        <strong>Tipo:</strong> <?php echo $bebida['tipo']; ?><br>
                        <strong>Precio:</strong> <?php echo $bebida['precio']; ?><br>
                        <strong>Descripción:</strong> <?php echo $bebida['descripcion']; ?><br>
                        <div>
                            <a href="<?php echo base_url('adminBebidas/editar/' . $bebida['id_bebida']); ?>" class="btn btn-secondary">Editar</a>
                            <a href="<?php echo base_url('adminBebidas/eliminar/' . $bebida['id_bebida']); ?>" class="btn btn-danger">Eliminar</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
        <div class="mt-4">
        <a href="<?php echo base_url('adminBebidas/agregar'); ?>" class="btn btn-primary">Agregar Bebida</a>
        </div>
    </div>
</body>
</html>