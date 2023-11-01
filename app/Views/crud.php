<!DOCTYPE html>
<html>

<head>
  <title>ByTender</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
  <form action="<?php base_url('Crud/Ingreso') ?>"></form>
  <div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <label for="admin" class="form-label">
        <li class="list-group-item"><button><a href="<?php base_url('agreg') ?>">Agregar</a></button>
          <button><a href="<?php base_url('editar') ?>">Editar</a></button>
          <button><a class="" href="<?php echo base_url('/salir') ?>">Salir <span class="sr-only">(current)</span></a></button>   
        </li>
      </label>
    </div>
  </div>
  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="">
      <li class="">
      
      </li>

    </ul>

  </div>
  </form>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>