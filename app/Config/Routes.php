<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->post('/', 'barControlador::index');
$routes->get('/', 'barControlador::index');
$routes->get('/login' , 'loginControlador::Index');
$routes->get('/register','registerControlador::Index');





$routes->post('login' , 'loginControlador::Loguearse');
$routes->post('/register','registerControlador::registrarse');

$routes->get('crud', 'Crud::ingreso'); 
$routes->post('crud', 'Crud::ingreso'); 


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

$routes->get('barControlador/verDetalleOrden/(:num)', 'barControlador::verDetalleOrden/$1');
$routes->get('adminBebidas', 'AdminBebidasControlador::index');
$routes->post('adminBebidas', 'AdminBebidasControlador::index');
$routes->get('barControlador/index', 'barControlador::index');
$routes->post('barControlador/filtrarPorTipo', 'barControlador::filtrarPorTipo');

$routes->post('adminBebidas/guardar', 'AdminBebidasControlador::guardar');
$routes->post('adminBebidas/actualizar/(:num)', 'AdminBebidasControlador::actualizar/$1');
$routes->post('barControlador/buscarBebida', 'barControlador::buscarBebida');

$routes->get('barControlador', 'barControlador::index');

$routes->post('login', 'loginControlador::Loguearse');
$routes->get('loginVista' , 'loginControlador::Login');


$routes->post('barControlador/agregarAlCarrito/(:num)', 'barControlador::agregarAlCarrito/$1');
$routes->post('barControlador/procesarCompra', 'barControlador::procesarCompra');

$routes->get('carrito', 'CarritoControlador::verCarrito');
$routes->post('carrito/agregar', 'CarritoControlador::agregarAlCarrito');
$routes->post('carrito/eliminar', 'CarritoControlador::eliminarDelCarrito');
$routes->post('carrito/comprar', 'CarritoControlador::realizarCompra'); 


$routes->get('barControlador/comprar', 'BarControlador::comprar');
$routes->get('procesarCompra', 'MetodoPagoControlador::procesarCompra');

$routes->get('CompraController/mostrarFormulario', 'CompraController::mostrarFormulario');
$routes->post('CompraController/procesarFormulario', 'CompraController::procesarFormulario');

$routes->get('barControlador/comprarVista', 'BarControlador::agregarAlCarrito');
$routes->post('barControlador/comprarVista', 'BarControlador::agregarAlCarrito');
$routes->POST('barControlador/comprarVista/(:num)', 'BarControlador::comprar/$1');

$routes->get('salir', 'loginControlador::salir');
$routes->get('adminBebidas/agregar', 'AdminBebidasControlador::agregarVista');
$routes->post('adminBebidas/agregar', 'AdminBebidasControlador::agregarVista');
$routes->get('adminBebidas/editar/(:num)', 'AdminBebidasControlador::editar/$1');
$routes->post('adminBebidas/editar/', 'AdminBebidasControlador::editar/');
$routes->get('adminBebidas/eliminar/(:num)', 'AdminBebidasControlador::eliminar/$1');
$routes->post('adminBebidas/eliminar/', 'AdminBebidasControlador::eliminar/$1');
$routes->get('AdminBebidasControlador/guardar_imagen', 'AdminBebidasControlador::guardar_imagen');
$routes->post('AdminBebidasControlador/guardar_imagen', 'AdminBebidasControlador::guardar_imagen');
$routes->get('usuarioCuenta', 'barControlador::usuarioCuenta');

$routes->post('agregar', 'AdminBebidasControlador::agregarA');
$routes->get('admin_bebidas/agregar', 'AdminBebidasControlador::tipos');
$routes->post('actualizar','AdminBebidasControlador::actualizar');
$routes->get('nuevo', 'AddControlador::NuevoAdmin');
$routes->post('nuevo', 'AddControlador::NuevoAdmin');






