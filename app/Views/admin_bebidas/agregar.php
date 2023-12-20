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
   


    <div class="container">

        <section>
            <h2>Formulario de Agregar Bebida</h2>

            <form action="<?php echo site_url('agregar'); ?>" method="post" enctype="multipart/form-data">
                <label for="nombre_bebida">Nombre:</label>
                <input type="text" name="nombre_bebida" required>
                <label for="id_tipo">Tipo:</label>
                <select name="id_tipo" id='id_tipo'>
                        <option value="1">Alcoholica</option>
                        <option value="2">No Alcoholica</option>
                </select>
                <label for="precio">Precio:</label>
                <input type="number" name="precio" required>
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" required></textarea>
                <label for="id_imagen">imagen</label>
                <input type="file" name="id_imagen" required>


                <input type="submit" value="Agregar" class>

            </form>

        </section>
    </div>
 
</body>

</html>