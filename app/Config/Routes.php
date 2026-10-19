<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/buah', 'buah::index');
$routes->get('/profile', 'Profile::index');
$routes->get('praktikum-oop', 'PraktikumOop::index');
$routes->get('tugas-oop', 'TugasOop::index');

