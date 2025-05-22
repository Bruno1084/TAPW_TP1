<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Menu Principal - Routes
$routes->get('/', 'MenuPrincipal::index');


// Amo - Routes
$routes->get('/amos', 'AmoController::getAll');
$routes->get('/amos/(:num)', 'AmoController::getOne/$1');
// Amo - Create
$routes->get('/amos/crear', 'AmoController::getCreate');
$routes->post('/amos/crear', 'AmoController::postCreate');
//  Amo - Edit
$routes->get('/amos/editar/(:num)', 'AmoController::getEdit/$1');
$routes->post('amos/editar/(:num)', 'AmoController::postEdit/$1');
// Amo - Delete
$routes->get('/amos/eliminar/(:num)', 'AmoController::getDelete/$1');
// Amo - Adoptar
$routes->get('/amos/adoptar', 'AmoController::getAdoptar');
$routes->post('/amos/adoptar', 'AmoController::postAdoptar');

$routes->get('/amos/adoptar/editar/(:num)', 'AmoController::getEditAdoptar/$1');
$routes->post('/amos/adoptar/editar/(:num)', 'AmoController::postEditAdoptar/$1');
$routes->post('/amos/adoptar/eliminar', 'AmoController::deleteAdoptar/$1');


// Mascota - Routes
$routes->get('/mascotas', 'MascotaController::getAll');
$routes->get('/mascotas/(:num)', 'MascotaController::getOne/$1');
// Mascota - Create
$routes->get('/mascotas/crear', 'MascotaController::getCreate');
$routes->post('/mascotas/crear', 'MascotaController::postCreate');
// Mascota - Edit
$routes->get('/mascotas/editar/(:num)', 'MascotaController::getEdit/$1');
$routes->post('/mascotas/editar/(:num)', 'MascotaController::postEdit/$1');
// Mascota - Delete
$routes->get('/mascotas/eliminar/(:num)', 'MascotaController::getDelete/$1');


// Veterinario - Routes
$routes->get('/veterinarios', 'VeterinarioController::getAll');
$routes->get('/veterinarios/(:num)', 'VeterinarioController::getOne/$1');
// Veterinario - Create
$routes->get('/veterinarios/crear', 'VeterinarioController::getCreate');
$routes->post('/veterinarios/crear', 'VeterinarioController::postCreate');
// Veterinario - Edit
$routes->get('/veterinarios/editar/(:num)', 'VeterinarioController::getEdit/$1');
$routes->post('/veterinarios/editar/(:num)', 'VeterinarioController::postEdit/$1');
// Veterinario - Delete
$routes->get('/veterinarios/eliminar/(:num)', 'VeterinarioController::getDelete/$1');
// Veterinario - Atender
$routes->get('/veterinarios/atender', 'VeterinarioController::getAtender');
$routes->post('/veterinarios/atender', 'VeterinarioController::postAtender');

$routes->get('/veterinarios/atender/editar/(:num)', 'VeterinarioController::getEditAtender/$1');
$routes->post('/veterinarios/atender/editar/(:num)', 'VeterinarioController::postEditAtender/$1');
$routes->get('/veterinarios/atender/eliminar/(:num)', 'VeterinarioController::deleteAtender/$1');