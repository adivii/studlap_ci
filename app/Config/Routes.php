<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'MahasiswaController::index');
$routes->get('/user/bus', 'MahasiswaController::list_bus');
$routes->get('/admin/', 'AdminController::index');
$routes->get('/admin/list/mahasiswa', 'AdminController::show_mhs');
$routes->get('/admin/create/mahasiswa', 'AdminController::add_mhs');
$routes->post('/admin/save/mahasiswa', 'MahasiswaController::save');
$routes->get('/admin/edit/mahasiswa/(:any)', 'AdminController::edit_mhs/$1');
$routes->post('/admin/update/mahasiswa', 'MahasiswaController::update');
$routes->delete('/admin/delete/mahasiswa/(:any)', 'MahasiswaController::delete/$1');
$routes->get('/admin/get/kelas', 'KelasController::get_kelas');
$routes->get('/admin/get/kamar', 'KamarController::get_kamar');
$routes->get('/admin/get/bus', 'BusController::get_bus');
$routes->get('/admin/get/kelompok', 'KelompokController::get_kelompok');
$routes->get('/user/get/kelas', 'KelasController::get_kelas');
$routes->get('/user/get/kamar/(:any)', 'KamarController::get_kamar_mahasiswa/$1');
$routes->get('/user/get/kelas', 'KelasController::get_kelas');
$routes->get('/user/get/kamar', 'KamarController::get_kamar_mahasiswa/-');
$routes->get('/user/get/bus/(:any)', 'BusController::get_bus_mahasiswa/$1');
$routes->get('/user/get/bus', 'BusController::get_bus_mahasiswa/-');
$routes->get('/user/get/kelompok', 'KelompokController::get_kelompok');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
