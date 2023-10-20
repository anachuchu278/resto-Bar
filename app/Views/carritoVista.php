<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
</head>

<body>
    <h1>Mi Carrito de Compras</h1>

    <?php if (isset($productosEnCarrito) && count($productosEnCarrito) > 0) : ?>
        <table>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($productosEnCarrito as $producto) : ?>
                <tr>
                    <td><?= $producto['nombre'] ?></td>
                    <td><?= $producto['precio'] ?></td>
                    <td><?= $producto['cantidad'] ?></td>
                    <td><?= $producto['subtotal'] ?></td>
                    <td>
                        <a href="<?= base_url('carritoControlador/eliminarProducto/' . $producto['id']) ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3"><strong>Total</strong></td>
                <td><strong><?= $total ?></strong></td>
                <td></td>
            </tr>
        </table>
        <a href="<?= base_url('carritoControlador/checkout') ?>">Continuar al Pago</a>
    <?php else : ?>
        <p>El carrito está vacío.</p>
    <?php endif; ?>

    <a href="<?= base_url('productosVista') ?>">Seguir Comprando</a>
</body>

</html>