<!DOCTYPE html>
<html><head>
<title>ByTender</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>

<body>
    <style>
        body {
            background: linear-gradient(to right, #B53A3A , #902C2C);
        }
    </style>
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
                                <button ><a href="<?php site_url('bebidas'); ?>"> mas informacion</a> </button>
                                <h5 class="card-title"><?php echo $bebida['nombre']; ?></h5>
                                <p class="card-text"><strong>Tipo:</strong> <?php echo $bebida['tipo_id']; ?></p>
                                <p class="card-text"><strong>Precio:</strong> <?php echo $bebida['precio']; ?></p>
                                <p class="card-text"><strong>Descripción:</strong> <?php echo $bebida['descripcion']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>
</div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js"
        integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
</body>

</html>