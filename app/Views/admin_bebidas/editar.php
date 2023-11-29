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
                
                <h2>Formulario de Editar Bebida</h2>
                <form action="<?php echo base_url(''); ?>" method="post">
                   
                    <input type="hidden" name="id_bebida" value="<?php  $bebida->id_bebida; ?>" >
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value="<?php  $bebida->nombre; ?>" >
                    <label for="tipo">Tipo:</label>
                    <input type="text" name="tipo" value="<?php  $bebida->tipo_id; ?>" >
                    <label for="precio">Precio:</label>
                    <input type="number" name="precio" value="<?php  $bebida->precio; ?>" >
                    <label for="descripcion">Descripción:</label>
                    <input type="text" name="descripcion" value="<?php $bebida->descripcion;?>">
                    <input type="submit" value="Agregar" class>
                </form>
                
            </section>
        </div>

</body>
</html>
