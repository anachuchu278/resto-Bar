<!DOCTYPE html>
<html>

<head>
  <title>ByTender</title>
  <link rel="stylesheet" href="<?php echo base_url('css/barVista.css') ?>">
</head>

<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Signika' rel='stylesheet' type='text/css'>


  
  <form action="<?php echo base_url('barControlador/buscarBebida'); ?>" method="post" class="form-inline formulario">
    <div class="container">
      <div class="input-group">
        <input type="text" name="busqueda" placeholder="Buscar bebida favorita" class="form-control">
        <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
      </div>
  </form>

  <div class="container py-4">
    <?php if (isset($bebidaEncontrada)) : ?>
        <section class="mt-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Información de la bebida:</h2>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($bebidaEncontrada as $bebida) : ?>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Nombre:</strong> <?php echo $bebidaEncontrada['nombre']; ?></li>
                                <li class="list-group-item"><strong>Tipo:</strong> <?php echo $bebidaEncontrada['tipo_id']; ?></li>
                                <li class="list-group-item"><strong>Precio:</strong> <?php echo $bebidaEncontrada['precio']; ?></li>
                                <li class="list-group-item"><strong>Descripción:</strong> <?php echo $bebidaEncontrada['descripcion']; ?></li>
                                <li class="list-group-item">
                                <img src="<?php echo base_url(); ?>assets/images/<?php echo $bebidaEncontrada['imagen_ruta']; ?>" alt="Imagen de la bebida" style="max-width: 100%; height: auto;"></li>
                            </ul>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </section>
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
                                <a href="<?php echo base_url('barControlador/verDetalleOrden/' . $bebida['tipo_id']); ?>">Más Información</a>
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