<!DOCTYPE html>
<html>
<head>
    <title>Bar - Editar Bebida</title>
    <link rel="stylesheet" href="<?php echo base_url('css/adminBebidas.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/editarBebida.css'); ?>">
</head>
<body>
    <header>
        <div class="container">
            <h1>Bar - Editar Bebida</h1>
        </div>
    </header>

    <nav>
        <div class="container">
            <ul>
                <li><a href="<?php echo base_url('barControlador'); ?>">Inicio</a></li>
                
            </ul>
        </div>
    </nav>

    <!-- ... (código anterior) ... -->

        <div class="container">
            <section>
                <?php foreach ($bebida as $item) :?>
                <h2>Formulario de Editar Bebida</h2>
                <form action="<?php echo base_url('admin_bebidas/actualizar/' ); ?>" method="post">
                    <label for="nombre">ID:</label>
                    <input type="text" name="nombre" value="<?php echo $item['id_bebida']; ?>" required>

                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value="<?php echo $item['nombre']; ?>" required>
                    <label for="tipo">Tipo:</label>
                    <input type="text" name="tipo" value="<?php echo $item['tipo']; ?>" required>
                    <label for="precio">Precio:</label>
                    <input type="number" name="precio" value="<?php echo $item['precio']; ?>" required>
                    <label for="descripcion">Descripción:</label>
                    <!-- ... (resto del formulario) ... -->
                </form>
                <?php endforeach; ?>
            </section>
        </div>

</body>
</html>
