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
$routes->setDefaultController('Available');
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
$routes->match(['get', 'post'], '/Register/Agency/submit', 'Register::addAgency');
$routes->match(['get', 'post'], '/Register/Customer/submit', 'Register::addCustomer');

$routes->match(['get', 'post'], '/Login', 'Login::index');
$routes->match(['get', 'post'], '/AddNew', 'AddNew::index');

$routes->match(['get','post'], '/rent/(:segment)', 'Available::rentnow');
$routes->match(['get','post'], '/Available/rent/(:segment)', 'Available::rentnow');

$routes->get('/AgencyBooked', 'Available::bookedAgency');
$routes->get('Available/AgencyBooked', 'Available::bookedAgency');

$routes->get('/', 'Available::index');
$routes->get('/Logout', 'Login::logout');
$routes->get('/Register', 'Register::index');
$routes->get('/Booked', 'Available::booked');
$routes->get('/Available', 'Available::index');
$routes->get('/Register/Customer', 'Register::customer');
$routes->get('/Register/Agency', 'Register::agency');
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
