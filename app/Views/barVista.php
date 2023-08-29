<!DOCTYPE html>
<html>

<head>
    <title>Bar</title>
    <!-- Enlace al archivo CSS personalizado -->
    <link rel="stylesheet" href="<?php echo base_url('css/barVista.css'); ?>">
</head>

<body>
    <div class='position-relative'>
        <header class="bg-dark text-white">
            <div class="container py-3">
                <h1>CryptoCafé</h1>
            </div>
            <form action="<?php echo base_url('barControlador/buscarBebida'); ?>" method="post" class="form-inline">
                <input type="text" name="busqueda" placeholder="Buscá tu bebida favorita" class="form-control mr-2">
                <input type="submit" value="Buscar" class="btn btn-primary">
            </form>
    </div>
    <!DOCTYPE html>
    <html lang="en"> 
    

    

    </html>
    

            </section>
        </div>
    </nav>
    <div class="container py-4">
        <?php if (isset($bebidaEncontrada)) : ?>
            <?php if (is_array($bebidaEncontrada)) : ?>
                <section class="mt-4">
                    <div class="bebida-encontrada">
                        <h2>Información de la bebida:</h2>
                        <div class="bebida-item">
                            <ul class="list-group">
                                <?php foreach ($bebidaEncontrada as $bebida) : ?>
                                    <li class="list-group-item"><strong>Nombre:</strong> <?php echo $bebida['nombre']; ?></li>
                                    <li class="list-group-item"><strong>Tipo:</strong> <?php echo $bebida['tipo']; ?></li>
                                    <li class="list-group-item"><strong>Precio:</strong> <?php echo $bebida['precio']; ?></li>
                                    <li class="list-group-item"><strong>Descripción:</strong> <?php echo $bebida['descripcion']; ?></li>
                                    <li class="list-group-item"><strong>Ingredientes:</strong> <?php echo $bebida['ingredientes']; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </section>
            <?php else : ?>
                <div class="alert alert-info mt-4">No se encontraron bebidas con ese nombre.</div>
            <?php endif; ?>
        <?php elseif (isset($bebidas) && is_array($bebidas)) : ?>
            <section class="mt-4">
                <h2>Bebidas Disponibles:</h2>
                <div class="bebidas-container">
                    <?php foreach ($bebidas as $bebida) : ?>
                        <div class="bebida-item">
                            <strong>Nombre:</strong> <?php echo $bebida['nombre']; ?>
                            <strong>Tipo:</strong> <?php echo $bebida['tipo']; ?>
                            <strong>Precio:</strong> <?php echo $bebida['precio']; ?>
                            <strong>Descripción:</strong> <?php echo $bebida['descripcion']; ?>
                            <strong>Ingredientes:</strong> <?php echo $bebida['ingredientes']; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
            <a href="<?php echo base_url('adminBebidas/agregar'); ?>" class="boton">Agregar Bebida</a>
        <?php endif; ?>
    </div>
</body>

</html>