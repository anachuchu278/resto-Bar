    <!DOCTYPE html>
    <html>

    <head>
      <title>ByTender</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
        <div class="justify-content-center">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <label for="admin" class="form-label">
                <li class="list-group-item">
                  <button><a href="<?php echo base_url('adminBebidas/agregar') ?>">Agregar</a></button>
                  <button><a href="<?php echo base_url('adminBebidas') ?>">Admin</a></button>
                </li>
              </label>
            </div>
          </div>
        </div>
      </div>

      




      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>

    </html>