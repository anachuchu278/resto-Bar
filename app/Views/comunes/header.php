<link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet">
<script src="<?php echo base_url() ?>js/bootstrap.bundle.min.js"></script>
<style>
  body {
    background: #AB762D;
  }
</style>
<header class="p-3 mb-3 border-bottom">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
          <use xlink:href="#bootstrap"></use>
        </svg>
      </a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="<?= site_url("inicio") ?>" class="nav-link px-2 link-light link-underline-opacity-25 link-underline-opacity-100-hover">Inicio</a></li>
        <li><a href="<?= site_url("login") ?>" class="nav-link px-2 link-light link-underline-opacity-25 link-underline-opacity-100-hover">Login</a></li>
        <li><a href="<?= site_url("register") ?>" class="nav-link px-2 link-light  link-underline-opacity-25 link-underline-opacity-100-hover">Register</a></li>
      </ul>
      </form>
      <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        </ /img src="" alt="mdo" width="32" height="32" class="rounded-circle">
      </a>
      <ul class="dropdown-menu text-small">
        <li><a class="dropdown-item" href="#">Nuevo proyecto...</a></li>
        <li><a class="dropdown-item" href="#">Configuración</a></li>
        <li><a class="dropdown-item" href="#">Perfil</a></li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
      </ul>
    </div>
  </div>
  </div>
</header>