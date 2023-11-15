<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <title>Procesar Compra</title>
</head>
<body>
<script src="https://www.paypal.com/sdk/js?client-id=ARukU0UroRBxiQfp0mUVMAaIO26h2iW6Zw47-oKYmyDyE1Poljq8OGcLPFpzFGTYyNKZD05bZCuPtUqo&components=button"></script>

    <h1>Procesar Compra</h1>

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
                <?php foreach ($productos as $producto) : ?>
                    <tr>
                        <td><?= $producto['nombre']; ?></td>
                        <td><?= $producto['cantidad']; ?></td>
                        <td><?= $producto['precio']; ?></td>
                        <td><?= $producto['precio'] * $producto['cantidad']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <p>Total: <?= $total; ?></p>

        <form action="<?= base_url('barControlador/procesarCompra'); ?>" method="post">
            <button type="submit">Confirmar Compra</button>
            
        </form>

    <?php else : ?>
        <p>No hay productos en el carrito.</p>
    <?php endif; ?>
   
    
    <script>alert("La compra ha sido procesada");</script>
    

    <div id="paypal-button-container"></div>
    <script>
paypal.Buttons({
  style: {
    layout: 'vertical',
    color:  'blue',
    shape:  'rect',
    label:  'paypal'
  }
}).render('#paypal-button-container');
    </script>
</body>



</html>