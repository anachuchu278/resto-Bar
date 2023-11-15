
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar al Carrito</title>
</head>
<body>
    <div class="container my-5">
        <h2 class="mb-4">Agregar al Carrito</h2>
        <ul class="list-group">
    <li class="list-group-item"><strong>Nombre:</strong> <?= $producto['nombre']; ?></li>
    <li class="list-group-item"><strong>Tipo:</strong> <?= $producto['tipo_id']; ?></li>
    <li class="list-group-item"><strong>Precio:</strong> <?= $producto['precio']; ?></li>
    <li class="list-group-item"><strong>Descripción:</strong> <?= $producto['descripcion']; ?></li>
    <li class="list-group-item">
        <img src="<?= base_url('assets/images/' . $producto['imagen_ruta']); ?>" alt="Imagen de la bebida" style="max-width: 100%; height: auto;">
    </li>
</ul>

<form action="<?= base_url('barControlador/comprarVista/' . $producto['id_bebida']); ?>" method="post">
    <!-- Otros campos del formulario -->
    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" value="1" min="1">
    <a href="<?= base_url('CompraController/mostrarFormulario'); ?>">Realizar Compra</a>
    <button type="submit">Agregar al Carrito</button>
</form>
    </div>
</body>
</html>