<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar</title>

    <!-- Agrega los enlaces a Bootstrap CSS y tus estilos personalizados -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Cremita */
        }
        .table {
            background-color: #fff; /* Blanco para resaltar la tabla */
        }
        .btn-primary {
            background-color: #dc3545; /* Rojo como color principal */
            border-color: #dc3545;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h1 class="mb-4">Comprar</h1>

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
                                <?php if (isset($carrito[$id_bebida])) : ?>
                                    <?= $carrito[$id_bebida]; ?>
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
            <a href="<?= base_url('barControlador/index') ?>" class="btn btn-primary">Volver a la lista de bebidas</a>

        <?php else : ?>
            <p>No hay productos en el carrito.</p>
        <?php endif; ?>
    </div>

    <!-- Agrega el enlace a Bootstrap JS al final del cuerpo del documento para mejorar el rendimiento -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://www.paypal.com/sdk/js?client-id=AZQBCaHQ4lHq6OI-mMRoxPv8nHioysdo_lnwAWuXxHgD31c5-3Nvw-fs0_WTL_-ghOvt8WeoipePRltE"></script>

<!-- Contenedor para el botón de PayPal -->
<div id="paypal-button-container"></div>

<!-- Script para inicializar el botón de PayPal -->
<script>
    paypal.Buttons({
        style: {
            shape: 'rect',
            color: 'silver',
            layout: 'vertical',
            label: 'pay',
        },
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?= $total ?>', // Utiliza el precio dinámicamente
                    }
                }]
            });
        },
        onCancel: function(data) {
            alert('Pago cancelado');
        },
        onApprove: function(data, actions) {
            actions.order.capture().then(function(details) {
                window.location.href = "<?= base_url('procesarCompra') ?>";
            });
        }
    }).render('#paypal-button-container');
    
</script>
</html>