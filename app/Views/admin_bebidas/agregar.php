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
                  
                    <form action="<?php echo base_url('agregar'); ?>" method="post" enctype="multipart/form-data">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" required>
                        <label for="tipo">Tipo:</label>
                        <select name="tipo" id="">
                     
                            <option value='tipo_id'>
                           
                        </option>
                    
                        </select>
                        <label for="precio">Precio:</label>
                        <input type="number" name="precio" required>
                        <label for="descripcion">Descripción:</label>
                        <textarea name="descripcion" required></textarea>
                        <label for="ingredientes">Ingredientes</label>
                        <textarea name="ingredientes" required></textarea>
                        <!-- <input type="file" name="imagen" required> -->
                        
                        
                        <input type="submit" value="Agregar" class>
                        
                    </form>
                   
                </section>
    </div>
 
</body>

</html>