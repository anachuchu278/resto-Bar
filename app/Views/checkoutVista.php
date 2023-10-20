<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>

<body>
    <h1>Checkout</h1>
    <form action="<?= base_url('barControlador/procesarCompra') ?>" method="post">
        <button type="submit">Procesar Compra</button>
    </form>
</body>

</html>