<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Bebida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <?php if (!empty($bebidaEncontrada)) : ?>
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Información de la bebida:</h2>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Nombre:</strong> <?php echo $bebidaEncontrada['nombre']; ?></li>
                        <li class="list-group-item"><strong>Tipo:</strong> <?php echo $bebidaEncontrada['tipo_id']; ?></li>
                        <li class="list-group-item"><strong>Precio:</strong> <?php echo $bebidaEncontrada['precio']; ?></li>
                        <li class="list-group-item"><strong>Descripción:</strong> <?php echo $bebidaEncontrada['descripcion']; ?></li>
                        <li class="list-group-item">
                            <img src="<?php echo base_url(); ?>assets/images/<?php echo $bebidaEncontrada['imagen_ruta']; ?>" alt="Imagen de la bebida" style="max-width: 100%; height: auto;">
                        </li>
                    </ul>
                </div>
            </div>
        <?php else : ?>
            <div class="alert alert-warning" role="alert">
                No se encontró información para la bebida seleccionada.
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>