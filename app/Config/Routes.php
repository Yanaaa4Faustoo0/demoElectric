<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/about', 'About::index');
$routes->get('/services', 'Services::index');
$routes->match(['get', 'post'], '/contact', 'Contact::index');
$routes->get('/register', 'Register::index');
$routes->post('/register', 'Register::create');

$routes->get('/accounts', 'CustomerAccounts::index');
$routes->get('/account/(:num)', 'CustomerAccounts::viewAccount/$1');

$routes->get('/accounts/create', 'CustomerAccounts::create');
$routes->post('/accounts/store', 'CustomerAccounts::store');

$routes->get('/accounts/edit/(:num)', 'CustomerAccounts::edit/$1');
$routes->post('/accounts/update/(:num)', 'CustomerAccounts::update/$1');

$routes->post('/accounts/delete/(:num)', 'CustomerAccounts::delete/$1');

$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::authenticate');
$routes->get('/logout', 'Login::logout');