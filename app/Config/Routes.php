<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Menu Principal - Routes
$routes->get('/', 'MenuPrincipal::index');


// Amo - Routes
$routes->get('/amos', 'AmoController::getAll'); // GetAll
$routes->get('/amos/(:num)', 'AmoController::getOne/$1'); // GetOne
//  Amo - Edit
$routes->get('/amos/editar/(:num)', 'AmoController::getEdit/$1');
$routes->post('amos/editar/(:num)', 'AmoController::postEdit/$1');
// Amo - Delete
$routes->get('/amos/eliminar/(:num)', 'AmoController::getDelete/$1');
$routes->post('/amos/eliminar/(:num)', 'AmoController::postDelete/$1');


// Mascota - Routes
$routes->get('/mascotas', 'MascotaController::getAll'); // GetAll
$routes->get('/mascotas/(:num)', 'MascotaController::getOne/$1'); // GetOne
// Mascota - Edit
$routes->get('/mascotas/editar/(:num)', 'MascotaController::getEdit/$1');
$routes->post('/mascotas/editar/(:num)', 'MascotaController::postEdit/$1');
// Mascota - Delete
$routes->get('/mascotas/eliminar/(:num)', 'MascotaController::getDelete/$1');
$routes->post('/mascotas/eliminar/(:num)', 'MascotaController::postDelete/$1');


// Veterinario - Routes
$routes->get('/veterinarios', 'VeterinarioController::getAll'); // GetAll
$routes->get('/veterinarios/(:num)', 'VeterinarioController::getOne/$1'); // GetOne
// Veterinario - Edit
$routes->get('/veterinarios/editar/(:num)', 'VeterinarioController::getEdit/$1');
$routes->post('/veterinarios/editar/(:num)', 'VeterinarioController::postEdit/$1');
// Veterinario - Delete
$routes->get('/veterinaros/eliminar/(:num)', 'VeterinarioController::getDelete/$1');
$routes->post('/veterinaros/eliminar/(:num)', 'VeterinarioController::postDelete/$1');