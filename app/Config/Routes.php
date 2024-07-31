<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->post('user/login', 'User::login');

$routes->resource('blog');

$routes->group('api', ['namespace' => 'App\Controllers\API'], function ($routes) {
    //URI para controlador de usuarios.
    // http://localhost/restapicetec/public/api/usuarios/
    $routes->get('usuarios', 'Usuarios::index');

    // http://localhost/restapicetec/public/api/usuarios/register/
    $routes->post('usuarios/register', 'Usuarios::register');
    // http://localhost/restapicetec/public/api/usuarios/edit/
    $routes->get('usuarios/edit/(:num)', 'Usuarios::edit/$1');
    // http://localhost/restapicetec/public/api/usuarios/update/
    $routes->put('usuarios/update/(:num)', 'Usuarios::update/$1');

    // http://localhost/restapicetec/public/api/usuarios/login
    $routes->post('usuarios/login', 'Usuarios::login');
    // http://localhost/restapicetec/public/api/usuarios/create/
    $routes->post('usuarios/create', 'Usuarios::create');
});
