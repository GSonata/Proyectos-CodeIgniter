<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//Calculadora
$routes->get('/calculadora', 'Calculadora::mostrar');
$routes->post('/calculadora/operar', 'Calculadora::calcular');