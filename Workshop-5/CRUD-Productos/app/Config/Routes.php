
<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Ruta principal
$routes->get('/', 'Home::index');

// Rutas del CRUD de productos
$routes->get('productos', 'Productos::index');

$routes->post('productos/guardar', 'Productos::guardar');

$routes->get('productos/editar/(:num)', 'Productos::editar/$1');

$routes->post('productos/actualizar/(:num)', 'Productos::actualizar/$1');

$routes->post('productos/eliminar/(:num)', 'Productos::eliminar/$1');
