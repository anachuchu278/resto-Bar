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
$routes->get('/inicio', 'barControlador::index');
$routes->get('/login' , 'loginControlador::Index');
$routes->get('/register','registerControlador::Index');

$routes->post('/login' , 'loginControlador::loguearse');
$routes->post('/register','registerControlador::registrarse');

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
$routes->get('/', 'barControlador::index');
$routes->get('bebidasControlador', 'BebidasControlador::index');
$routes->get('barControlador/verDetalleOrden/(:num)', 'barControlador::verDetalleOrden/$1');
$routes->get('barControlador/(:any)', 'barControlador::$1');
$routes->get('bebidasControlador/(:any)', 'BebidasControlador::$1');
$routes->get('adminBebidas', 'AdminBebidasControlador::index');
$routes->get('adminBebidas/agregar', 'AdminBebidasControlador::agregar');
$routes->post('adminBebidas/agregar', 'AdminBebidasControlador::agregar');
$routes->get('adminBebidas/editar/(:num)', 'AdminBebidasControlador::editar/$1');
$routes->post('adminBebidas/editar/(:num)', 'AdminBebidasControlador::editar/$1');
$routes->get('adminBebidas/eliminar/(:num)', 'AdminBebidasControlador::eliminar/$1');
$routes->post('adminBebidas/guardar', 'AdminBebidasControlador::guardar');
$routes->post('adminBebidas/actualizar/(:num)', 'AdminBebidasControlador::actualizar/$1');
$routes->post('/llamar_desde_arduino', 'LlamarDesdeArduino::recibirLlamado');
$routes->post('barControlador/buscarBebida', 'barControlador::buscarBebida');
$routes->get('barControlador', 'barControlador::index');
$routes->post('login', 'loginControlador::loguearse');
$routes->get('loginVista' , 'loginControlador::Login');
$routes->get('/', 'SignupController::index');
$routes->get('/signup', 'RegisterControlador::index');
$routes->match(['get', 'post'], 'RegisterControlador/store', 'RegisterControlador::store');