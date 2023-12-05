<?php
$is_logged = 0;
$user = session('user');
if (null !== $user){
  $is_logged = (session('user')['id'] > 0);
} 
?>
<!DOCTYPE html>
<html>

<head>
  <!-- <link rel="shortcut icon" href="img/descarga.png"> -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="icon" type="image/png" href="http://localhost/resto-Bar/public/img/faviconn.png"> -->
  <link rel="shortcut icon" href="<? base_url('public\img\descarga.png') ?>">
  <title>ByTender</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
</head>

<body>
  <?php if ($is_logged): ?>
  <h2>Bienvenido, <?php echo $user['nombre'];?>!</h2>
  <?php endif;?>
  <style>
    body {
      background: linear-gradient(to right, #FCEFEF, #bbb7af); /* Cremita */
    }
    .btn-primary {
      background-color: #dc3545; /* Rojo como color principal */
      border-color: #dc3545;
    }
    .formulario {
      margin-top: 20px;
    }
  </style>
  <form action="<?= base_url('barControlador/filtrarPorTipo') ?>" method="post">
    <div class="dropdown">
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <?php foreach ($filtrar as $tipo) : ?>
                <li><button class="dropdown-item" type="submit" name="tipo_id" value="<?= $tipo['tipo_id'] ?>"><?php  echo $tipo['tipo_id']?></button></li>
            <?php endforeach; ?>
        </ul>
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Filtrar por tipo
          </button>
        
        
    </div>
</form>
</div>

  <div class="container py-4">
    <?php if (isset($bebidaEncontrada)): ?>
    <section class="mt-4">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title">Información de la bebida:</h2>
          <ul class="list-group list-group-flush">
            <?php foreach ($bebidaEncontrada as $bebida): ?>
            <li class="list-group-item"><strong>Nombre:</strong>
              <?php echo $bebidaEncontrada['nombre']; ?>
            </li>
            <li class="list-group-item"><strong>Tipo:</strong>
              <?php echo $bebidaEncontrada['tipo_id']; ?>
            </li>
            <li class="list-group-item"><strong>Precio:</strong>
              <?php echo $bebidaEncontrada['precio']; ?>
            </li>
            <li class="list-group-item"><strong>Descripción:</strong>
              <?php echo $bebidaEncontrada['descripcion']; ?>
            </li>
            <li class="list-group-item">
              <img src="<?php echo base_url(); ?>assets/images/<?php echo $bebidaEncontrada['imagen_ruta']; ?>"
                alt="Imagen de la bebida" style="max-width: 100%; height: auto;">
            </li>
            <?php endforeach; ?>
          </ul>

        </div>
      </div>
    </section>
    <?php elseif (isset($bebidas) && is_array($bebidas)): ?>
    <section class="mt-4">
      <h2 class="mb-3">Bebidas Disponibles:</h2>
      <div class="row">
        <?php foreach ($bebidas as $bebida): ?>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
          <img src="<?php echo base_url(); ?>assets/images/<?php echo $bebida['imagen_ruta']; ?>"
                alt="Imagen de la bebida" style="max-width: 100%; height: auto;">
                <?php echo $bebida['nombre']; ?>
              </h5>
              <p class="card-text"><strong>Tipo:</strong>
                <?php echo $bebida['tipo_id']; ?>
              </p>
              <p class="card-text"><strong>Precio:</strong>
                <?php echo $bebida['precio']; ?>
              </p>
              <p class="card-text"><strong>Descripción:</strong>
                <?php echo $bebida['descripcion']; ?>
              </p>
              <button><a href="<?php site_url('informacion'); ?>"> mas informacion</a> </button>
              <?php if ($is_logged):?>
              <form action="<?= base_url('barControlador/agregarAlCarrito/' . $bebida['id_bebida']); ?>" method="post">
                <div class="mb-3">
                  <label for="cantidad" class="form-label">Cantidad</label>
                  <input type="number" class="form-control" id="cantidad" name="cantidad" value="1">
                </div>
                <button class="btn btn-primary" type="submit">Agregar al Carrito</button>
              </form>
              <?php endif;?>
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