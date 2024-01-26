<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'PST::index');
$routes->get('/home', 'PST::index');

//PST
$routes->post('pst/create', 'PST::create');
$routes->get('pst/report', 'PST::report');
$routes->get('pst/report/(:num)', 'PST::tahun/$1');
$routes->get('pst/dashboard', 'PST::dashboard');
$routes->get('pst/dashboard/(:num)/(:num)', 'PST::dashboard/$1/$2');
