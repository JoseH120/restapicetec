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

    //URI PARA CONTROLADO DE TUTORES
    //http://localhost/sistema/api/tutores
    $routes->get('tutores', 'Tutores::index');

    //http://localhost/sistema/api/tutores/create
    $routes->post('tutores/create', 'Tutores::create');

    //http://localhost/sistema/api/tutores/edit
    $routes->get('tutores/edit/(:num)', 'Tutores::edit/$1');

    //http://localhost/sistema/api/tutores/update
    $routes->put('tutores/update/(:num)', 'Tutores::update/$1');

    //http://localhost/sistema/api/tutores/delete
    $routes->delete('tutores/delete/(:num)', 'Tutores::delete/$1');

    //URI PARA CONTROLADO DE ESTUDIANTES
    //http://localhost/sistema/api/estudiantes
    $routes->get('estudiantes', 'Estudiantes::index');

    //http://localhost/sistema/api/estudiantes/create
    $routes->post('estudiantes/create', 'Estudiantes::create');

    //http://localhost/sistema/api/estudiantes/edit
    $routes->get('estudiantes/edit/(:num)', 'Estudiantes::edit/$1');

    //http://localhost/sistema/api/estudiantes/update
    $routes->put('estudiantes/update/(:num)', 'Estudiantes::update/$1');

    //http://localhost/sistema/api/estudiantes/delete
    $routes->delete('estudiantes/delete/(:num)', 'Estudiantes::delete/$1');

    //URI PARA CONTROLADO DE CURSOS
    //http://localhost/sistema/api/cursos/index
    $routes->get('cursos', 'Cursos::index');

    //http://localhost/sistema/api/cursos/create
    $routes->post('cursos/create', 'Cursos::create');

    //http://localhost/sistema/api/cursos/edit/
    $routes->get('cursos/edit/(:num)', 'Cursos::edit/$1');

    //http://localhost/sistema/api/cursos/update/
    $routes->put('cursos/update/(:num)', 'Cursos::update/$1');

    //http://localhost/sistema/api/cursos/delete/
    $routes->delete('cursos/delete/(:num)', 'Cursos::delete/$1');


    //URI PARA CONTROLADO DE ESTUDIANTES CURSOS
    //http://localhost/sistema/api/estudiantescursos/
    $routes->get('estudiantescursos', 'EstudiantesCursos::index');

    //http://localhost/sistema/api/estudiantescursos/create
    $routes->post('estudiantescursos/create', 'EstudiantesCursos::create');

    //http://localhost/sistema/api/estudiantescursos/edit/
    $routes->get('estudiantescursos/edit/(:num)', 'EstudiantesCursos::edit/$1');

    //http://localhost/sistema/api/estudiantescursos/update/
    $routes->put('estudiantescursos/update/(:num)', 'EstudiantesCursos::update/$1');

    //http://localhost/sistema/api/estudiantescursos/delete/
    $routes->delete('estudiantescursos/delete/(:num)', 'EstudiantesCursos::delete/$1');

    //URI PARA CONTROLADO DE ACTIVIDADES
    //http://localhost/sistema/api/actividades/
    $routes->get('actividades', 'Actividades::index');

    //http://localhost/sistema/api/actividades/create
    $routes->post('actividades/create', 'Actividades::create');

    //http://localhost/sistema/api/actividades/edit/
    $routes->get('actividades/edit/(:num)', 'Actividades::edit/$1');

    //http://localhost/sistema/api/actividades/update/
    $routes->put('actividades/update/(:num)', 'Actividades::update/$1');

    //http://localhost/sistema/api/actividades/delete/
    $routes->delete('actividades/delete/(:num)', 'Actividades::delete/$1');

    //URI PARA CONTROLADO DE ACTIVIDADES ESTUDIANTES
    //http://localhost/sistema/api/actividadesestudiantes/
    $routes->get('actividadesestudiantes', 'ActividadesEstudiantes::index');

    //http://localhost/sistema/api/actividadesestudiantes/create
    $routes->post('actividadesestudiantes/create', 'ActividadesEstudiantes::create');

    //http://localhost/sistema/api/actividadesestudiantes/edit/
    $routes->get('actividadesestudiantes/edit/(:num)', 'ActividadesEstudiantes::edit/$1');

    //http://localhost/sistema/api/actividadesestudiantes/update/
    $routes->put('actividadesestudiantes/update/(:num)', 'ActividadesEstudiantes::update/$1');

    //http://localhost/sistema/api/actividadesestudiantes/delete/
    $routes->delete('actividadesestudiantes/delete/(:num)', 'ActividadesEstudiantes::delete/$1');

    //ListarEstudiantes delCurso
    //http://localhost/sistema/api/cursos/getlistbycourse/
    $routes->get('cursos/getlistbycourse/(:num)', 'Cursos::getListByCourse/$1');

    //http://localhost/sistema/api/cursos/gettutor/
    $routes->get('cursos/gettutor/(:num)', 'Cursos::getTutor/$1');
});
