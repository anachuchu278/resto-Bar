<!DOCTYPE html>
<html>

<head>
    <title>Bar - Editar Bebida</title>
    
    <link rel="stylesheet" href="<?php echo base_url('css/editarBebida.css'); ?>">
    
</head>

<body>
   


    <!-- ... (código anterior) ... -->

    <div class="container">
        <section>



            <div class="container">

                <section>
                    <h2>Formulario de Editar Bebida</h2>

                    <form action="<?php echo site_url('actualizar'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_bebida" value="<?= $bebida['id_bebida']?>">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" value="<?= $bebida['nombre']?>"required>
                        <label for="tipo">Tipo:</label>
                        <select name="tipos" id="" >
                            <option value="<?= $bebida['id_tipo']?>">1</option>
                            <option value="<?= $bebida['id_tipo']?>">2</option>
                        </select>
                        <label for="precio">Precio:</label>
                        <input type="number" name="precio" value="<?= $bebida['precio']?>" required>
                        <label for="descripcion">Descripción:</label>
                        <input name="descripcion" value="<?= $bebida['descripcion']?>"required></input>
                        <label for="imagen_ruta">imagen</label>
                        <img src="<?=  base_url()?>/uploads/<?=$bebida['imagen_ruta'];?>"
                        alt="Imagen de la bebida" style="max-width: 100%; height: auto;">
                        <input type="file" name="imagen_ruta" value="<?= $bebida['imagen_ruta']?>" >


                        <input type="submit" value="Agregar" class>

                    </form>

                </section>
            </div>

        </section>
    </div>

</body>

</html>