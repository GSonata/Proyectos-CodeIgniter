<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//Calculadora
$routes->get('/calculadora', 'Calculadora::mostrar');
$routes->post('/calculadora/operar', 'Calculadora::calcular');

//LISTA DINAMICA
$routes->get('/lista', 'ListaController::index');
$routes->post('/lista/agregar', 'ListaController::agregar');
$routes->get('/lista/eliminar/(:num)', 'ListaController::eliminar/$1');