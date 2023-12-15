<?php
$is_logged = 0;
$user = session('user');
if (null !== $user) {
  $is_logged = (session('user')['id_usuario'] > 0);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>ByTender</title>

  <link rel="stylesheet" href="css/barVista.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/compressed/bootstrap/4.5.2/css
/bootstrap.min.css">
  <style>
    body {
      background: linear-gradient(to right, #FCEFEF, #bbb7af);
    }

    .btn-primary {
      background-color: #dc3545;
      border-color: #dc3545;
    }
  </style>
</head>

<body>
  <div class="container py-4">
    <?php if ($is_logged): ?>
      <h2>Bienvenido,
        <?php echo $user['nombre']; ?>!
      </h2>
    <?php endif; ?>
    <?php if (isset($bebidaEncontrada)): ?>
      <section class="mt-4">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title">Información de la bebida:</h2>
            <ul class="list-group list-group-flush">
              <?php foreach ($bebidaEncontrada as $bebida): ?>
                <li class="list-group-item"><strong>Nombre:</strong>
                  <?php echo $bebida['nombre']; ?>
                </li>
                <li class="list-group-item"><strong>Tipo:</strong>
                  <?php echo $bebida['tipo_id']; ?>
                </li>
                <li class="list-group-item"><strong>Precio:</strong>
                  <?php echo $bebida['precio']; ?>
                </li>
                <li class="list-group-item"><strong>Descripción:</strong>
                  <?php echo $bebida['descripcion']; ?>
                </li>
                <li class="list-group-item">

                  <img src="<?php echo base_url();
                  ?>assets/images/<?php echo $bebida['imagen_ruta']; ?>" alt="Imagen de la bebida" class="img-fluid">
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
            <div class="col-sm-3 col-lg-4 mb-5">
              <div class="card mb-4 shadow-sm border-danger">
                <img src="<?php echo base_url(); ?>assets/images/<?php

                   echo $bebida['imagen_ruta']; ?>" alt="Imagen de la bebida" class="img-fluid">
                <h5 class="card-title text-danger">
                  <?php echo

                    $bebida['nombre']; ?>
                </h5>

                <p class="card-text"><strong>Precio:</strong>
                  <?php echo $bebida['precio']; ?>
                </p>
                <p class="card-text"><strong>Descripción:</strong>
                  <?php echo $bebida['descripcion']; ?>
                </p>
                <button class="btn btn-danger"><a href="<?php
                site_url('informacion'); ?>" class="text-white"> más información</a>
                </button>

                <?php if ($is_logged): ?>
                  <form action="<?=

                    base_url('barControlador/comprarVista') ?>" method="post">
                    <input type="hidden" name="id_bebida" value="<?=
                      $bebida['id_bebida'] ?>">
                    <input type="number" name="cantidad" value="1">
                    <input type="submit" value="Agregar al Carrito">
                  </form>

                <?php endif; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

      </section>
    <?php endif; ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper
.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.mi
n.js"></script>
</body>

</html>