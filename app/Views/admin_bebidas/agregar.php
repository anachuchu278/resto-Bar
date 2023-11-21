<!DOCTYPE html>
<html>

<head>
    <title>Bar - Agregar Bebida</title>
    <link rel="stylesheet" href="<?php echo base_url('css/adminBebidas.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/agregarBebida.css'); ?>"> 
   
</head>

<body>
    <!-- <header>
        <div class="container">
            <h1>Bar - Agregar Bebida</h1>
        </div>
    </header> -->
    <style>
        body {
            background: linear-gradient(to right, #fcf9d8, #edebc9);
        }
    </style>


    <div class="container">

                <section>
                    <h2>Formulario de Agregar Bebida</h2>
                    <form action="<?php echo base_url('AdminBebidasControlador/guardar_imagen')?> " method="post">
                    <form action="<?php echo base_url('adminBebidas/guardar'); ?>" method="post">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" required>
                        <label for="tipo">Tipo:</label>
                        <input type="text" name="tipo" required>
                        <label for="precio">Precio:</label>
                        <input type="number" name="precio" required>
                        <label for="descripcion">Descripción:</label>
                        <textarea name="descripcion" required></textarea>
                        <label for="ingredientes">Ingredientes</label>
                        <textarea name="ingredientes" required></textarea>
                        <label for="imagen">Imagen del producto</label>

                        <input type="file" name="imagen" accept="image/*" required>
                        
                        <input type="submit" value="Agregar" class>
                        
                    </form>
                    </form>
                </section>
    </div>
</body>

</html>