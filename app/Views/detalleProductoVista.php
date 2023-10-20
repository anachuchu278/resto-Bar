<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Producto</title>
</head>

<body>
    <?php if (isset($producto) && !empty($producto)) : ?>
        <h1><?= $producto['nombre'] ?></h1>
        <p>Precio: <?= $producto['precio'] ?></p>
        <p>Descripción: <?= $producto['descripcion'] ?></p>
        <a href="<?= base_url('carritoControlador/agregarProducto/' . $producto['id']) ?>">Agregar al Carrito</a>
    <?php else : ?>
        <p>No se encontró información del producto.</p>
    <?php endif; ?>
</body>

</html>