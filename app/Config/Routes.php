<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('users', 'UserController::index');
$routes->get('/users/newusers', 'UserController::newusers');
$routes->post('/users/addusers', 'UserController::addusers');
$routes->delete('users/delete/(:num)', 'UserController::delete/$1');
$routes->get('users/edit/(:num)', 'UserController::editUser/$1');
$routes->post('users/update/(:num)', 'UserController::updateUsers/$1');

service('auth')->routes($routes);
