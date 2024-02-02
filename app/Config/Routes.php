<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/home', 'PST::index');
$routes->addRedirect('/', '/home');

//PST
$routes->post('/create', 'PST::create');
$routes->get('/report', 'PST::report');
$routes->get('/trash', 'PST::trash');
$routes->get('/report/(:num)', 'PST::tahun/$1');
$routes->get('/dashboard', 'PST::dashboard');
$routes->get('/dashboard/(:num)/(:num)', 'PST::dashboard/$1/$2');
$routes->post('/delete/(:num)', 'PST::delete/$1');
$routes->get('/edit/(:num)', 'PST::edit/$1');
$routes->get('/detail/(:num)', 'PST::detail/$1');
$routes->post('/update/(:num)', 'PST::update/$1');
$routes->get('/restore/(:any)', 'PST::restore/$1');
$routes->get('/restore', 'PST::restore');
$routes->post('/delete2/(:any)', 'PST::delete2/$1');
$routes->post('/delete2', 'PST::delete2');
