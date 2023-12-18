<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Compra</title>
    <!-- Agrega el enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Agrega el enlace al script de PayPal -->
    <script
        src="https://www.paypal.com/sdk/js?client-id=ARukU0UroRBxiQfp0mUVMAaIO26h2iW6Zw47-oKYmyDyE1Poljq8OGcLPFpzFGTYyNKZD05bZCuPtUqo&components=button"></script>
    <style>
        * {
            background-color: #f8f9fa;
            /* Cremita */

        }

        h1 {
            color: #dc3545;
            /* Rojo */
        }

        .table {
            background-color: #fff;
            /* Blanco para resaltar la tabla */
        }

        .button[type="submit"] {
            background-color: #dc3545;
            /* Rojo */
            color: #fff;
            /* Blanco para el texto */
            border: none;
            padding: 10px 15px;
            cursor: pointer;
        }

        #paypal-button-container {
            margin-top: 20px;

        }

        .btn {
            background-color: #dc3545;
            /* Rojo como color principal */
            border-color: #dc3545;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h1>Tu compra ah sido exitosaa!!</h1>

        <!-- Verificar si hay productos en el carrito -->
        <?php if(!empty($productos)): ?>

            <h3>Resumen de la compra</h3>
            <?php foreach($productos as $producto): ?>
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

<<<<<<< HEAD
        <?php else : ?>
            <p>Vuelve al inicio para seguir comprando</p>
=======
                        <tr>
                            <td>
                                <?= $producto['nombre']; ?>
                            </td>
                            <td>
                                <?= $producto['cantidad']; ?>
                            </td>
                            <td>
                                <?= $producto['precio']; ?>
                            </td>
                            <td>
                                <?= $producto['precio'] * $producto['cantidad']; ?>
                            </td>
                        </tr>

                    </tbody>
                </table>
            <?php endforeach; ?>
            <p>Total:
                <?= $total; ?>
            </p>

        <?php else: ?>
            <p>No hay productos en el carrito.</p>
>>>>>>> 76c299638cfc246f4bd0ae9ec8192593e48048e6
            <form action="<?php echo base_url(''); ?>" method="post">
                <a href="<?php echo base_url(''); ?>">
                    <input type="button" class="btn" value="Seguir Comprando">
                </a>
            </form>

        <?php endif; ?>

        <script>
            alert("La compra ha sido procesada");
        </script>

        <!-- Contenedor para el botón de PayPal -->
        <div id="paypal-button-container"></div>
        <script>
            paypal.Buttons({
                style: {
                    layout: 'vertical',
                    color: 'blue',
                    shape: 'rect',
                    label: 'paypal'
                }
            }).render('#paypal-button-container');
        </script>
    </div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>