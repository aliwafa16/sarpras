<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// $routes->get('/generate_qr/(:any)', 'Assets::generate_qr/$1');

$routes->get('/', 'Login::index');
$routes->get('/logout', 'Login::logout', ['filter' => 'authfilter']);

$routes->post('/auth', 'Login::login');

$routes->get('/Dashboard', 'Dashboard::index', ['filter' => 'authfilter']);


// Assets
$routes->get('/Assets', 'Assets::index');
$routes->get('/Assets/tambah', 'Assets::tambah');
$routes->get('/Assets/edit/(:num)', 'Assets::edit/$1');
$routes->get('/Assets/export-excel', 'Assets::export');
$routes->delete('/Assets/(:num)', 'Assets::hapus/$1');
$routes->post('/Assets/save', 'Assets::save');
$routes->post('/Assets', 'Assets::index');
$routes->post('/Assets/editParsial', 'Assets::editParsial');

// Jadwal Maintenance
$routes->get('/JadwalMaintenance', 'JadwalMaintenance::index');
$routes->get('/JadwalMaintenance/load', 'JadwalMaintenance::load');
$routes->get('/JadwalMaintenance/getJadwal/(:num)', 'JadwalMaintenance::getJadwal/$1');
$routes->get('/JadwalMaintenance/hapus/(:num)', 'JadwalMaintenance::hapus/$1');
$routes->post('JadwalMaintenance/tambah', 'JadwalMaintenance::tambah');
$routes->post('JadwalMaintenance/eventResize', 'JadwalMaintenance::eventResize');


// Main Category
$routes->get('/Main_Category', 'Main_Category::index');
$routes->delete('/Main_Category/(:num)', 'Main_Category::hapus/$1');
$routes->post('/Main_Category/tambah', 'Main_Category::tambah');
$routes->post('/Main_Category/edit/(:any)', 'Main_Category::edit/$1');


// Category
$routes->get('/Category', 'Category::index');
$routes->delete('/Category/(:num)', 'Category::hapus/$1');
$routes->post('/Category/tambah', 'Category::tambah');
$routes->post('/Category/edit/(:any)', 'Category::edit/$1');

// Brand
$routes->get('/Brand', 'Brand::index');
$routes->delete('/Brand/(:num)', 'Brand::hapus/$1');
$routes->post('/Brand/tambah', 'Brand::tambah');
$routes->post('/Brand/edit/(:any)', 'Brand::edit/$1');

// Type Assets
$routes->get('/TypeBrand', 'TypeBrand::index');
$routes->delete('/TypeBrand/(:num)', 'TypeBrand::hapus/$1');
$routes->post('/TypeBrand/tambah', 'TypeBrand::tambah');
$routes->post('/TypeBrand/edit/(:any)', 'TypeBrand::edit/$1');

// Condition Assets
$routes->get('/Condition', 'Condition::index');
$routes->delete('/Condition/(:num)', 'Condition::hapus/$1');
$routes->post('/Condition/tambah', 'Condition::tambah');
$routes->post('/Condition/edit/(:any)', 'Condition::edit/$1');


// Status Assets
$routes->get('/Status', 'Status::index');
$routes->delete('/Status/(:num)', 'Status::hapus/$1');
$routes->post('/Status/tambah', 'Status::tambah');
$routes->post('/Status/edit/(:any)', 'Status::edit/$1');

// Condition Assets
$routes->get('/Location', 'Location::index');
$routes->delete('/Location/(:num)', 'Location::hapus/$1');
$routes->post('/Location/tambah', 'Location::tambah');
$routes->post('/Location/edit/(:any)', 'Location::edit/$1');


// $routes->group("Location", function ($routes) {
//     $routes->get('/', 'Location::index');
//     $routes->delete('/(:num)', 'Location::hapus/$1');
//     $routes->post('/tambah', 'Location::tambah');
//     $routes->post('/edit/(:any)', 'Location::edit/$1');
// });



// $routes->post('/Main_Category/add', 'Main_Category::tambah');
// $routes->add('/')



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
