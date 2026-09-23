<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Public Front-end Routes
$routes->get('/', 'Home::index');
$routes->get('menu', 'Home::menu');
$routes->get('menu/(:segment)', 'Home::detail/$1');
$routes->post('order/process', 'Home::orderProcess');

// Authentication Routes
$routes->get('login', 'Auth::login');
$routes->post('login/process', 'Auth::processLogin');
$routes->get('logout', 'Auth::logout');

// Protected Admin Routes
$routes->group('admin', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', static function () {
        return redirect()->to(base_url('admin/menu'));
    });
    
    // Menu CRUD
    $routes->get('menu', 'Admin\Menu::index');
    $routes->get('menu/create', 'Admin\Menu::create');
    $routes->post('menu/store', 'Admin\Menu::store');
    $routes->get('menu/edit/(:num)', 'Admin\Menu::edit/$1');
    $routes->post('menu/update/(:num)', 'Admin\Menu::update/$1');
    $routes->get('menu/delete/(:num)', 'Admin\Menu::delete/$1');
});
