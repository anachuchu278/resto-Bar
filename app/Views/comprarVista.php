<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar</title>
</head>
<body>

    <h1>Comprar</h1>

    <!-- Verificar si hay productos en el carrito -->
    <?php if (!empty($productos)) : ?>

        <h3>Resumen de la compra</h3>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio Unitario</th>
                    <th scope="col">Precio Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $id_bebida => $producto) : ?>
                    <tr>
                        <td><?= $producto['nombre']; ?></td>
                        <td>
    <?php if (isset($carrito[$id_bebida]) && is_array($carrito[$id_bebida])) : ?>
        <?= isset($carrito[$id_bebida]['cantidad']) ? $carrito[$id_bebida]['cantidad'] : 0; ?>
    <?php else : ?>
        0
    <?php endif; ?>
</td>
                        <td><?= $producto['precio']; ?></td>
                        <td><?= $producto['precio'] * (isset($carrito[$id_bebida]) ? intval($carrito[$id_bebida]) : 0); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <p>Total: <?= $total; ?></p>

        <form action="<?= base_url('barControlador/procesarCompra'); ?>" method="post">
            <button type="submit">Procesar Compra</button>
        </form>

    <?php else : ?>
        
    <?php endif; ?>

</body>
</html>