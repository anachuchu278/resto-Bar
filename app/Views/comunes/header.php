<?php
$is_admin = 0; 
$user = session('user');
if (null !== $user){
  $is_admin = (session('user')  ['rol'] == 1);
} 
$is_logged = 0;
$user = session('user');
if (null !== $user){
  $is_logged = (session('user')  ['id']  > 0);
} 
 
?>
<html>
<link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet">
<script src="<?php echo base_url() ?>js/bootstrap.bundle.min.js"></script>
<style>
  .nav-item:hover {
    background-color: #f8f9fa; /* Cambia esto al color deseado */
  }
  body {
    background: #AB762D;
  }
</style>
<header class="p-3 mb-3 border-bottom">
  
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
        
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
      <?php if ($is_logged):?>
      <ul class="nav">
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('usuarioCuenta') ?>">Cuenta</a></li>
       
    

      
        
        
      </ul>
      <?php endif;?>
    </div>
  </div>
  </div>
</header> 
</html>