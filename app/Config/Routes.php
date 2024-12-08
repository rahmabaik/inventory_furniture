<?php

namespace Config;

// Create a new instance of our RouteCollection class.
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;

$routes = Services::routes();

// Load the system's routing file first, so that the app and
// environment can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}


// $routes->get('/dashboard', 'Dashboard::index');

$routes->get('/login', 'Login::index');
$routes->post('/login/process', 'Login::process');
$routes->get('/logout', 'Login::logout');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);



// Rute untuk categories
$routes->group('categories', function($routes) {
    $routes->get('/', 'CategoryController::index');
    $routes->get('create', 'CategoryController::create');
    $routes->post('store', 'CategoryController::store');
    $routes->get('edit/(:num)', 'CategoryController::edit/$1');
    $routes->post('update/(:num)', 'CategoryController::update/$1');
    $routes->delete('delete/(:num)', 'CategoryController::delete/$1');
});

// Rute untuk customers
$routes->group('customers', function($routes) {
    $routes->get('/', 'CustomerController::index');
    $routes->get('create', 'CustomerController::create');
    $routes->post('store', 'CustomerController::store');
    $routes->get('edit/(:num)', 'CustomerController::edit/$1');
    $routes->post('update/(:num)', 'CustomerController::update/$1');
    $routes->delete('delete/(:num)', 'CustomerController::delete/$1');
});

// Rute untuk furniture
$routes->group('furniture', function($routes) {
    $routes->get('/', 'FurnitureController::index');
    $routes->get('create', 'FurnitureController::create');
    $routes->post('store', 'FurnitureController::store');
    $routes->get('edit/(:num)', 'FurnitureController::edit/$1');
    $routes->post('update/(:num)', 'FurnitureController::update/$1');
    $routes->delete('delete/(:num)', 'FurnitureController::delete/$1');
});

// Rute untuk suppliers
$routes->group('suppliers', function($routes) {
    $routes->get('/', 'SupplierController::index');
    $routes->get('create', 'SupplierController::create');
    $routes->post('store', 'SupplierController::store');
    $routes->get('edit/(:num)', 'SupplierController::edit/$1');
    $routes->post('update/(:num)', 'SupplierController::update/$1');
    $routes->get('delete/(:num)', 'SupplierController::delete/$1');
});



// Rute untuk inventory transactions
$routes->group('inventory_transaction', function($routes) {
    $routes->get('/', 'InventoryTransactionController::index');
    $routes->get('create', 'InventoryTransactionController::create');
    $routes->post('store', 'InventoryTransactionController::store');
    $routes->get('edit/(:num)', 'InventoryTransactionController::edit/$1');
    $routes->post('update/(:num)', 'InventoryTransactionController::update/$1');
    $routes->delete('delete/(:num)', 'InventoryTransactionController::delete/$1');
});

// Rute untuk orders
$routes->group('orders', function($routes) {
    $routes->get('/', 'OrderController::index');
    $routes->get('create', 'OrderController::create');
    $routes->post('store', 'OrderController::store');
    $routes->get('edit/(:num)', 'OrderController::edit/$1');
    $routes->post('update/(:num)', 'OrderController::update/$1');
    $routes->delete('delete/(:num)', 'OrderController::delete/$1');
});

// Rute untuk order items
$routes->group('order_item', function($routes) {
    $routes->get('/', 'OrderItemController::index');
    $routes->get('create', 'OrderItemController::create');
    $routes->post('store', 'OrderItemController::store');
    $routes->get('edit/(:num)', 'OrderItemController::edit/$1');
    $routes->post('update/(:num)', 'OrderItemController::update/$1');
    $routes->delete('delete/(:num)', 'OrderItemController::delete/$1');
});
