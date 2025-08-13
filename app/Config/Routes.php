<?php

use App\Controllers\Home;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Home::class, 'index']);
$routes->get('dashboard', [Home::class, 'index']);

// $routes->group('categories', ['filter' => 'authorize'], function ($subRoutes) {
//     $subRoutes->get('', [InterfaceController::class, 'categories']);
//     $subRoutes->post('table', [InterfaceController::class, 'categoriesTable']);
//     $subRoutes->post('exists', [InterfaceController::class, 'categoryExists']);
//     $subRoutes->post('save', [InterfaceController::class, 'saveCategory']);
//     $subRoutes->post('delete/(:num)', [InterfaceController::class, 'deleteCategory/$1']);
// });

