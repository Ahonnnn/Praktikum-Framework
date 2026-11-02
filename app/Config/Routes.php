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

// $routes->get('kegiatan', 'Kegiatan::index');
// $routes->get('kegiatan/statistik', 'Kegiatan::statistik'); 
// $routes->get('kegiatan/(:num)', 'Kegiatan::detail/$1');


$routes->get('kegiatan', 'Kegiatan::index');
$routes->get('kegiatan/tambah', 'Kegiatan::tambah');
$routes->post('kegiatan/simpan', 'Kegiatan::simpan', ['filter' => 'csrf']);
$routes->get('kegiatan/statistik', 'Kegiatan::statistik');
$routes->get('kegiatan/(:num)/edit', 'Kegiatan::edit/$1');
$routes->post('kegiatan/(:num)/update', 'Kegiatan::perbarui/$1', ['filter' => 'csrf']);
$routes->post('kegiatan/(:num)/hapus', 'Kegiatan::hapus/$1', ['filter' => 'csrf']);
$routes->get('kegiatan/(:num)', 'Kegiatan::detail/$1');

$routes->get('kegiatan/cari', 'Kegiatan::cari');
