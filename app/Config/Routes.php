<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'LoginController::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

$routes->post('/val_login', 'LoginController::val_login_controller');
$routes->get('/index', 'IndexController::index');
$routes->post('/logout', 'LoginController::logout_controller');
$routes->post('/val_car_repeat', 'IndexController::validate_car_repeat_controller');
$routes->post('/insert-car', 'IndexController::insert_car_controller');
$routes->get('/switch_rol', 'LoginController::switch_rol_controller');
$routes->get('/edit-user', 'UserController::index');
$routes->post('/update-user', 'UserController::update_user_controller');
$routes->post('/read-cars-bycategory', 'IndexController::read_cars_bycategory_controller');
$routes->post('/read-cars-byprice', 'IndexController::read_cars_price_controller');




