<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/pst/home', 'PST::index');
$routes->addRedirect('/home', '/pst/home');
$routes->addRedirect('/', '/pst/home');

//PST
$routes->post('pst/create', 'PST::create');
$routes->get('pst/report', 'PST::report');
$routes->get('pst/trash', 'PST::trash');
$routes->get('pst/report/(:num)', 'PST::tahun/$1');
$routes->get('pst/dashboard', 'PST::dashboard');
$routes->get('pst/dashboard/(:num)/(:num)', 'PST::dashboard/$1/$2');
$routes->post('pst/delete/(:num)', 'PST::delete/$1');
$routes->get('pst/edit/(:num)', 'PST::edit/$1');
$routes->get('pst/detail/(:num)', 'PST::detail/$1');
$routes->post('pst/update/(:num)', 'PST::update/$1');
$routes->get('pst/restore/(:any)', 'PST::restore/$1');
$routes->get('pst/restore', 'PST::restore');
$routes->post('pst/delete2/(:any)', 'PST::delete2/$1');
$routes->post('pst/delete2', 'PST::delete2');
