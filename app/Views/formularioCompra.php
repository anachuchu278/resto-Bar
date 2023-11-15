<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Compra</title>
</head>
<body>

    <h1>Formulario de Compra</h1>

    <?= form_open('CompraController/procesarFormulario'); ?>

    <label for="ciudad">Ciudad:</label>
    <select name="ciudad" id="ciudad">
        <?php foreach ($ciudades as $ciudad) : ?>
            <option value="<?= $ciudad['id_ciudad']; ?>"><?= $ciudad['ciudad']; ?></option>
        <?php endforeach; ?>
    </select>

    <br>

    <label for="calle">Calle:</label>
    <select name="calle" id="calle">
        <?php foreach ($calles as $calle) : ?>
            <option value="<?= $calle['id_calle']; ?>"><?= $calle['calle']; ?></option>
        <?php endforeach; ?>
    </select>

    <br>

    <label for="metodo_pago">Método de Pago:</label>
    <select name="metodo_pago" id="metodo_pago">
        <?php foreach ($metodosPago as $metodoPago) : ?>
            <option value="<?= $metodoPago['metodo_id']; ?>"><?= $metodoPago['nombre']; ?></option>
        <?php endforeach; ?>
    </select>

    <br>

    <label for="provincia">Provincia:</label>
    <input type="text" name="provincia" id="provincia" required>

    <br>

    <button type="submit">Enviar Formulario</button>

    <?= form_close(); ?>

</body>
</html>