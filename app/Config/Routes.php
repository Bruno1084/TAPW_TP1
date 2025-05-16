<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Menu Principal - Routes
$routes->get('/', 'MenuPrincipal::index');
$routes->get('/mostrar', 'MenuPrincipal::getMostrar'); // GetMostrar
$routes->get('/alta', 'MenuPrincipal::getAlta'); // GetAlta
$routes->get('/baja', 'MenuPrincipal::getBaja'); // GetBaja
$routes->get('/modificacion', 'MenuPrincipal::getModificacion'); // GetModificacion


// Alta - Routes
$routes->post('/alta/amo_mascota', 'MenuPrincipal::postAmoMascotaAlta'); // PostAmoMascota

$routes->get('/alta/amo', 'MenuPrincipal::getAmoAlta'); // GetAmo
$routes->post('/alta/amo', 'MenuPrincipal::postAmo'); // PostAmo

$routes->get('/alta/mascota', 'MenuPrincipal::getMascotaAlta'); // GetMascota
$routes->post('/alta/mascota', 'MenuPrincipal::postMascota'); // PostMascota

$routes->get('/alta/veterinario', 'MenuPrincipal::getVeterinarioAlta'); // GetVeterinario
$routes->post('/alta/veterinario', 'MenuPrincipal::postVeterinario'); // PostVeterinario


// Baja - Routes
$routes->post('/baja/amo_mascota', 'MenuPrincipal::postAmoMascotaBaja'); // PostAmoMascotaBaja

$routes->get('/baja/amo', 'MenuPrincipal::getAmoBaja');
$routes->post('/baja/amo/(:num)', 'MenuPrincipal::postAmoBaja/$1');

$routes->get('/baja/mascota', 'MenuPrincipal::getMascotaBaja');
$routes->post('/baja/mascota', 'MenuPrincipal::postMascotaBaja'); // PostMascotaBaja

$routes->get('/baja/veterinario', 'MenuPrincipal::getVeterinarioBaja');
$routes->post('/baja/veterinario/(:num)', 'MenuPrincipal::postVeterinarioBaja');

// Modificacion - Routes
$routes->post('/modificacion/amo_mascota', 'MenuPrincipal::postAmoMascotaModificaicon');

$routes->get('/modificacion/mascota', 'MenuPrincipal::getMascotaModificacion');
$routes->post('/modificacion/mascota/(:num)', 'MenuPrincipal::postMascotaModificacion/$1');

$routes->get('/modicicacion/amo', 'MenuPrincipal::getAmoModificacion');



// Mostrar - Routes
// Amo - Routes
$routes->get('/amos', 'AmoController::getAll'); // GetAll
$routes->get('/amos/(:num)', 'AmoController::getOne/$1'); // GetOne
$routes->get('/amos/mascotas/(:num)', 'AmoController::getMascotasFromAmoView/$1'); // GetMascotasFromAmo

// Mascota - Routes
$routes->get('/mascotas', 'MascotaController::getAll'); // GetAll
$routes->get('/mascotas/(:num)', 'MascotaController::getOne/$1'); // GetOne
$routes->get('/mascotas/amos/(:num)', 'MascotaController::getAmosFromMascota/$1'); // GetAmosFromMascota

// Veterinario - Routes
$routes->get('/veterinarios', 'VeterinarioController::getAll'); // GetAll
$routes->get('/veterinarios/(:num)', 'VeterinarioController::getOne/$1'); // GetOne
$routes->get('/veterinarios/mascotas/(:num)', 'VeterinarioController::getMascotasFromVeterinario/$1'); // GetMascotasFromVeterinario
