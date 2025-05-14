<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Menu Principal - Routes
$routes->get('/mascota', 'MascotaController::index');  
$routes->get('/veterinario', 'VeterinarioController::index');

// Amo - Routes
$routes->get('/amos', 'AmoController::getAll'); // GetAll
$routes->get('/amos/(:num)', 'AmoController::getMascotasFromAmo/$1'); // GetMascotasFromAmo

// Mascota - Routes
$routes->get('/mascotas', 'MascotaController::getAll'); // GetAll
$routes->get('/mascotas/(:num)', 'MascotaController::getOne/$1'); // GetOne
