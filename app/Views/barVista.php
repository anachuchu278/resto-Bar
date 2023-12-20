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
  <link rel="stylesheet" href="<?php echo base_url('css/barVista.css'); ?>">

</head>

<body>
  <?php if ($is_logged) : ?>
    <h2>Bienvenido,
      <?php echo $user['nombre_usuario']; ?>!
    </h2>
  <?php endif; ?>

  <div class="container py-4">
    <?php if (isset($bebidaEncontrada)) : ?>
      <section class="mt-4">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title">Información de la bebida:</h2>
            <ul class="list-group list-group-flush">
              <?php foreach ($bebidaEncontrada as $bebida) : ?>
                <li class="list-group-item"><strong>Nombre:</strong>
                  <?php echo $bebidaEncontrada['nombre']; ?>
                </li>
                <li class="list-group-item"><strong>Tipo:</strong>
                  <?php echo $bebidaEncontrada['id_tipo']; ?>
                </li>
                <li class="list-group-item"><strong>Precio:</strong>
                  <?php echo $bebidaEncontrada['precio']; ?>
                </li>
                <li class="list-group-item"><strong>Descripción:</strong>
                  <?php echo $bebidaEncontrada['descripcion']; ?>
                </li>
                <li class="list-group-item">
                  <img src="<?= base_url() ?>/assets/images/<?= $bebidaEncontrada['imagen_ruta']; ?>" class="img-thumbnail" alt="">

                </li>
              <?php endforeach; ?>
            </ul>

          </div>
        </div>
      </section>
      <?php var_dump($bebidas); ?>
    <?php elseif (isset($bebidas) && is_array($bebidas)) : ?>
      <section class="mt-4">
        <div class="container">
          <h2 class="titulo">Bebidas Disponibles</h2>
          <div class="row row-cols-1 row-cols-md-3">
            <?php foreach ($bebidas as $bebida) : ?>
              <div class="col mb-4">
                <div class="card h-100">
                <img src="<?= base_url() ?>/uploads/<?= $bebida['imagen_ruta']; ?>" alt="Imagen de la bebida">
                  <div class="card-body d-flex flex-column">
                    <h3 class="card-title">
                      <?php echo $bebida['nombre_bebida']; ?>
                    </h3>
                    <p class="card-text"><strong>Tipo:</strong>

                      <?php
                      if ($bebida['id_tipo'] == 1) {
                        echo "Alcoholica";
                      } else {
                        echo "No Alcoholica";
                      }; ?>
                    </p>
                    <p class="card-text"><strong>Precio:</strong>
                      <?php echo $bebida['precio']; ?>
                    </p>
                    <p class="card-text"><strong>Descripción:</strong>
                      <?php echo $bebida['descripcion']; ?>
                    </p>
                    <?php if ($is_logged) : ?>
                      <form action="<?=base_url('barControlador/comprarVista') ?>" method="post">
                                    
                        <input type="hidden" name="id_bebida" value="<?=$bebida['id_bebida'] ?>">                                    
                        <input type="number" name="cantidad" value="1">
                        <input type="submit" value="Agregar al Carrito">
                      </form>

                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>



  </div>
  </section>
<?php endif; ?>
</div>

</body>

</html>