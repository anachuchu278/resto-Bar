<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos Disponibles</title>
</head>

<body>
    <h1>Productos Disponibles</h1>

    <?php if (isset($productos) && count($productos) > 0) : ?>
        <ul>
            <?php foreach ($productos as $producto) : ?>
                <li>
                    <?= $producto['nombre'] ?> - <?= $producto['precio'] ?> -
                    <a href="<?= base_url('carritoControlador/agregarProducto/' . $producto['id']) ?>">Agregar al Carrito</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>No hay productos disponibles.</p>
    <?php endif; ?>
</body>

</html>