<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

// Minggu ke 1
$routes->get('/buah', 'buah::index');
$routes->get('/profile', 'Profile::index');

// Minggu ke 2
$routes->get('praktikum-oop', 'PraktikumOop::index');
$routes->get('tugas-oop', 'TugasOop::index');

// Minggu ke 3
$routes->get('sapa', 'Sapa::index');
$routes->get('sapa/(:segment)', 'Sapa::nama/$1');

$routes->get('kegiatan', 'Kegiatan::index');
$routes->get('kegiatan/(:num)', 'Kegiatan::detail/$1');

