<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="<?php echo base_url("/js/carrito.js"); ?>"></script>
  <title>ByTender</title>
  <link rel="icon" href="<?php echo base_url('fondoBotella.png'); ?>" type="image/png">
</head>

<body>
  <header class="bg-dark text-white py-3">
    <div class="container d-flex justify-content-center align-items-center">
      <img src="<?php echo base_url("/assets/images/fondoEmpresa.jpg"); ?>" alt="" class="row justify-content-center align-items-center">
    </div>
    <div class="container d-flex justify-content-between align-items-center">
      <a class="inicio" href="<?php echo base_url('register'); ?>">Registrarse</a>
    </div>
    <form action="<?php echo base_url('barControlador/buscarBebida'); ?>" method="post" class="form-inline formulario">
      <div class="container">
        <div class="input-group">
          <input type="text" name="busqueda" placeholder="Buscar bebida favorita" class="form-control">
          <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
        </div>
      </div>
    </form>
  </header>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url() ?>">Inicio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <?php if (!empty($tiposBebida)) : ?>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Filtrar por tipo
            </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php foreach ($tiposBebida as $tipo) : ?>
                  <li><a class="dropdown-item" href="<?php echo base_url('barControlador/filtrarPorTipo/' . $tipo['id']); ?>"><?php echo $tipo['nombre']; ?></a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

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
                <li class="list-group-item"><strong>Descripción:</strong> <?php echo $belbida['descripcion']; ?></li>
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
                  <h5 class="card-title"><?php echo $bebida['nombre']; ?></h5>
                  <p class="card-text"><strong>Tipo:</strong> <?php echo $bebida['tipo_id']; ?></p>
                  <p class="card-text"><strong>Precio:</strong> <?php echo $bebida['precio']; ?></p>
                  <p class="card-text"><strong>Descripción:</strong> <?php echo $bebida['descripcion']; ?></p>
                  <button type="submit" class="btn btn-primary">Agregar al Carrito</button>
                </div>
              </div>
            </div>
            
          <?php endforeach; ?>
        </div>
      </section>
    <?php endif; ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>