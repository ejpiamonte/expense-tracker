<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'ExpenseController::dashboard'); // Use `dashboard()` as your main method
$routes->get('expense/create', 'ExpenseController::create');
$routes->post('expense/store', 'ExpenseController::store');
$routes->get('expense/edit/(:num)', 'ExpenseController::edit/$1');
$routes->post('expense/update/(:num)', 'ExpenseController::update/$1');
$routes->get('expense/delete/(:num)', 'ExpenseController::delete/$1');
$routes->get('/expense/getExpenses', 'ExpenseController::getExpenses');
$routes->post('dashboard/color', 'ExpenseController::updateColor');

