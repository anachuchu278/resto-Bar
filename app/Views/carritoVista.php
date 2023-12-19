<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <!-- Agrega aquí tus enlaces a los estilos CSS si es necesario -->
</head>
<body>
    <div class="container">
        <h2>Carrito de Compras</h2>

        
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                    </tr>
                </thead>
                <?php if (isset($productos) && !empty($productos)) : ?>
        
        <?php foreach ($productos as $producto): ?>
          <tr>
            <td>
              <?= $producto['nombre']; ?>
            </td>
            <td>
              <?= $producto['cantidad']; ?>
            </td>
            <td>
              <?= $producto['precio_unitario']; ?>
            </td>
            <td>
                <a href="<?= base_url('carritoControlador/eliminarDelCarrito/' . $producto['id_bebida']) ?>" class="btn btn-danger">Eliminar</a>
            </td>
          </tr>
        <?php endforeach; ?>
     
    <?php endif ?>
            </table>
            <p>Total: <?= $total; ?></p>
        <a href="<?= base_url('barControlador/index') ?>" class="btn btn-primary">Volver a la lista de bebidas</a>
    </div>

    <!-- Agrega aquí tus enlaces a scripts JS si es necesario -->
</body>
</html>