<!DOCTYPE html>
<html>

<head>
    <title>ByTender</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>


    <h1>ENTRO A PROBAR</h1> 
    <div class="container">
    
    <?php if (isset($obtenerDatos)) : ?>
        <section class="mt-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Información de la bebida:</h2>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($obtenerDatos as $bebida) : ?>
                            <li class="list-group-item"><strong>Nombre:</strong> <?php echo $bebida['nombre']; ?></li>
                            <li class="list-group-item"><strong>Tipo:</strong> <?php echo $bebida['tipo_id']; ?></li>
                            <li class="list-group-item"><strong>Precio:</strong> <?php echo $bebida['precio']; ?></li>
                            <li class="list-group-item"><strong>Descripción:</strong> <?php echo $bebida['descripcion']; ?></li>
                            <li class="list-group-item">
                                <img src="<?php echo base_url(); ?>assets/images/<?php echo $bebida['imagen_ruta']; ?>" alt="Imagen de la bebida" style="max-width: 100%; height: auto;">
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <?php elseif (isset($bebidas) && is_array($bebidas)) : ?>
        <section class="mt-4">
            <h2 class="mb-3">Bebidas Disponibles:</h2>
            <div class="row">
                <?php foreach ($bebidas as $bebida) : ?>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="<?php echo base_url(); ?>assets/images/<?php echo $bebida['imagen_ruta']; ?>" alt="Imagen de la bebida" class="card-img-top" style="max-height: 200px; object-fit: cover;">
                            <div class="card-body">
                                
                                <h5 class="card-title"><?php echo $bebida['nombre']; ?></h5>
                                <p class="card-text"><strong>Tipo:</strong> <?php echo $bebida['tipo_id']; ?></p>
                                <p class="card-text"><strong>Precio:</strong> <?php echo $bebida['precio']; ?></p>
                                <p class="card-text"><strong>Descripción:</strong> <?php echo $bebida['descripcion']; ?></p>
                                <button ><a href="<?php site_url('informacion'); ?>"> mas informacion</a> </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>
</div>
                        
  

    
</body>
</html>