<link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet">
<script src="<?php echo base_url() ?>js/bootstrap.bundle.min.js"></script>
<style>
  body {
    background: #AB762D ;
  }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-transparent ">
  <div class="container-fluid">
    <div>
      <img src="<?php echo base_url("assets/images/unnamed.jpg") ?>" href="<?php site_url("inicio") ?>">
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" class="custom-text-color"aria-current="page" href="<?= site_url("inicio") ?>">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url("login") ?>">Login</a>
        </li>
        <div name="test">
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url("register") ?>">Register</a>
        </li>
        </div>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <form action="<?php echo base_url('barControlador/buscarBebida'); ?>" method="post" class="form-inline formulario">
          <div class="container">
            <div class="input-group">
              <input type="text" name="busqueda" placeholder="Buscar bebida favorita" class="form-control">
              <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
            </div>
          </div>
        </form>
        </section>
    </div>
</nav>
<div class="container py-4">
  <?php if (isset($bebidaEncontrada)) : ?>
    <?php if (is_array($bebidaEncontrada)) : ?>
      <section class="mt-4">
        <div class="bebida-encontrada">
          <h2>Información de la bebida:</h2>
          <div class="bebida-item">
            <ul class="list-group">
              <?php foreach ($bebidaEncontrada as $bebida) : ?>
                <li class="list-group-item"><strong>Nombre:</strong> <?php echo $bebida['nombre']; ?></li>
                <li class="list-group-item"><strong>Tipo:</strong> <?php echo $bebida['tipo']; ?></li>
                <li class="list-group-item"><strong>Precio:</strong> <?php echo $bebida['precio']; ?></li>
                <li class="list-group-item"><strong>Descripción:</strong> <?php echo $bebida['descripcion']; ?></li>
                <li class="list-group-item"><strong>Ingredientes:</strong> <?php echo $bebida['ingredientes']; ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </section>
    <?php else : ?>
      <div class="alert alert-info mt-4">No se encontraron bebidas con ese nombre.</div>
    <?php endif; ?>
  <?php elseif (isset($bebidas) && is_array($bebidas)) : ?>
    <section class="mt-4">
      <h2>Bebidas Disponibles:</h2>
      <div class="bebidas-container">
        <?php foreach ($bebidas as $bebida) : ?>
          <div class="bebida-item">
            <strong>Nombre:</strong> <?php echo $bebida['nombre']; ?>
            <strong>Tipo:</strong> <?php echo $bebida['tipo']; ?>
            <strong>Precio:</strong> <?php echo $bebida['precio']; ?>
            <strong>Descripción:</strong> <?php echo $bebida['descripcion']; ?>
            <strong>Ingredientes:</strong> <?php echo $bebida['ingredientes']; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </section>
    <a href="<?php echo base_url('adminBebidas/agregar'); ?>" class="boton">Agregar Bebida</a>
  <?php endif; ?>
</div>
</form>
</form>
</div>
</div>
</nav>