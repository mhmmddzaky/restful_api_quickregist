<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->resource('pendaftaranlomba');
$routes->resource('pengguna');
$routes->resource('lomba');
$routes->resource('kategorilomba');
$routes->resource('admin');
$routes->post('updateStatusLomba', 'Lomba:: updateStatusLomba');