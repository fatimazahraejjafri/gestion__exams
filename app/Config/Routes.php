<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'register::signup');

$routes->get('register', 'register::index');
$routes->post('register', 'register::store');

$routes->get('login', 'Login::index');
$routes->post('login', 'Login::auth');

$routes->get('dashboard', 'Login::dashboard');
$routes->get('logout', 'Login::logout');

