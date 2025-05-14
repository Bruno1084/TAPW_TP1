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

// Amo - Routes
$routes->get('/amos', 'AmoController::getAll'); // GetAll
$routes->get('/amos/(:num)', 'AmoController::getMascotasFromAmo/$1'); // GetMascotasFromAmo

// Mascota - Routes
$routes->get('/mascotas', 'MascotaController::getAll'); // GetAll
$routes->get('/mascotas/(:num)', 'MascotaController::getAmosFromMascota/$1'); // GetAmosFromMascota

// Veterinario - Routes
$routes->get('/veterinarios', 'VeterinarioController::getAll'); // GetAll
$routes->get('/veterinarios', 'VeterinarioController::getMascotasFromVeterinario'); // GetMascotasFromVeterinario
