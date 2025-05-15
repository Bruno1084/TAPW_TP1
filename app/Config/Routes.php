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
$routes->post('/alta/amo_mascota', 'MenuPrincipal::postAmoMascota'); // PostAmoMascota

$routes->get('/alta/amo', 'MenuPrincipal::getAmo'); // GetAmo
$routes->post('/alta/amo', 'MenuPrincipal::postAmo'); // PostAmo

$routes->get('/alta/mascota', 'MenuPrincipal::getMascota'); // GetMascota
$routes->post('/alta/mascota', 'MenuPrincipal::postMascota'); // PostMascota

$routes->get('/alta/veterinario', 'MenuPrincipal::getVeterinario'); // GetVeterinario
$routes->post('/alta/veterinario', 'MenuPrincipal::postVeterinario'); // PostVeterinario


// Amo - Routes
$routes->get('/amos', 'AmoController::getAll'); // GetAll
$routes->get('/amos/(:num)', 'AmoController::getMascotasFromAmo/$1'); // GetMascotasFromAmo

// Mascota - Routes
$routes->get('/mascotas', 'MascotaController::getAll'); // GetAll
$routes->get('/mascotas/(:num)', 'MascotaController::getAmosFromMascota/$1'); // GetAmosFromMascota

// Veterinario - Routes
$routes->get('/veterinarios', 'VeterinarioController::getAll'); // GetAll
$routes->get('/veterinarios', 'VeterinarioController::getMascotasFromVeterinario'); // GetMascotasFromVeterinario
