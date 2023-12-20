<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
  
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
        <h1>Tu compra ah sido exitosa!!</h1>

            <p>No hay productos en el carrito.</p>
            <form action="<?php echo base_url(''); ?>" method="post">
                <a href="<?php echo base_url(''); ?>">
                    <input type="button" class="btn" value="Seguir Comprando">
                </a>
            </form>

      

        <script>
            alert("La compra ha sido procesada");
        </script>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>