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

    <div class="container">
        <section>
            <h2>Formulario de Editar Bebida</h2>
            <form action="<?php echo base_url('adminBebidas/actualizar/' . $resultados['id_bebida']); ?>" method="post">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" value="<?php echo $resultados['nombre']; ?>" required>
                <label for="tipo">Tipo:</label>
                <input type="text" name="tipo" value="<?php echo $resultados['tipo']; ?>" required>
                <label for="precio">Precio:</label>
                <input type="number" name="precio" value="<?php echo $resultados['precio']; ?>" required>
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" required><?php echo $resultados['descripcion']; ?></textarea>
                <label for="ingredientes">Ingredientes:</label>
                <textarea name="ingredientes" required><?php echo $resultados['ingredientes']; ?></textarea>
                <input type="submit" value="Guardar Cambios">
            </form>
        </section>
    </div>
</body>
</html>
