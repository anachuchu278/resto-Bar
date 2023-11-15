<?php
$is_admin = 0; 
$user = session('user');
if (null !== $user){
  $is_admin = (session('user')  ['rol'] == 1);
} 
 
?>
<html>
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
        <li><a href="<?= site_url("/") ?>" class="nav-link px-2 link-dark link-underline-opacity-25 link-underline-opacity-100-hover">Inicio</a></li>
        <li><a href="<?= site_url("login") ?>" class="nav-link px-2 link-dark link-underline-opacity-25 link-underline-opacity-100-hover">Login</a></li>
        <li><a href="<?= site_url("register") ?>" class="nav-link px-2 link-dark  link-underline-opacity-25 link-underline-opacity-100-hover">Register</a></li>
        <li><a href="<?= site_url("carrito") ?>" class="nav-link px-2 link-dark  link-underline-opacity-25 link-underline-opacity-100-hover">Carrito</a></li>
        <li><a href="<?= site_url("salir") ?>" class="nav-link px-2 link-dark  link-underline-opacity-25 link-underline-opacity-100-hover">salir</a></li>
      
      
        <?php if ($is_admin): ?>
                    <div class="btn-box btns">
                        <a href="<?= base_url('adminBebidas') ?>"><button type="submit" class="btn">Admin</button></a>
                    </div>
        <?php endif; ?>
        
      
     
      
      </ul>
      </form>
      <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
       
      </a>

      <ul class="menu">
        
        
      </ul>
    </div>
  </div>
  </div>
</header> 
</html>