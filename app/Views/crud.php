    <!DOCTYPE html>
    <html>

    <head>
      <title>ByTender</title>
      <link rel="stylesheet" href="<?php echo base_url('css/crud.css')?>">

    </head>

    <body>
      <h1 class="text-center">Administrador</h1>
      <style>
        body {
          background: linear-gradient(to right, #fcf9d8, #edebc9);
        }
      </style>
      <form action="<?php base_url('Crud/Ingreso') ?>"></form>
      <div class="container">
            <div class="card-body">
              <div class="card">
              <label for="admin" class="form-label">
                <li class="list-group-item">
                  <button><a href="<?php echo base_url('adminBebidas/agregar') ?>">Agregar</a></button>
                  <button><a href="<?php echo base_url('adminBebidas') ?>">Admin</a></button>
                  <button><a href="<?php echo base_url('index') ?>">Nuevo Admin</a></button>
                </li>
              </label>
              </div>
            </div>
      </div>

      




    </body>

    </html>