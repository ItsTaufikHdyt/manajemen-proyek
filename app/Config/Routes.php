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
$routes->get('/', 'Home::index',['as'=>'home']);

$routes->group('admin', ['filter' => 'admin'], static function ($routes) {
    $routes->get('dashboard', 'Admin::index',['as'=>'adminDashboard']);
    $routes->get('proyek/add', 'Admin::addProyek',['as'=>'adminAddProyek']);
    $routes->get('proyek/show/(:any)', 'Admin::showProyek/$1',['as'=>'adminShowProyek']);
    $routes->post('proyek/store', 'Admin::storeProyek',['as'=>'adminStoreProyek']);
    $routes->get('proyek/edit/(:any)', 'Admin::editProyek/$1',['as'=>'adminEditProyek']);
    $routes->get('proyek/pdf/(:any)', 'Admin::pdfProyek/$1',['as'=>'adminPdfProyek']);
    $routes->post('proyek/update/(:any)', 'Admin::updateProyek/$1',['as'=>'adminUpdateProyek']);
    $routes->get('proyek/delete/(:any)', 'Admin::deleteProyek/$1',['as'=>'adminDeleteProyek']);

    $routes->get('user', 'Admin::user',['as'=>'adminUser']);
    $routes->get('user/add', 'Admin::addUser',['as'=>'adminAddUser']);
    $routes->post('user/store', 'Admin::storeUser',['as'=>'adminStoreUser']);
    $routes->get('user/edit/(:any)', 'Admin::editUser/$1',['as'=>'adminEditUser']);
    $routes->post('user/update/(:any)', 'Admin::updateUser/$1',['as'=>'adminUpdateUser']);
    $routes->get('user/delete/(:any)', 'Admin::deleteUser/$1',['as'=>'adminDeleteUser']);

    $routes->get('karyawan', 'Admin::karyawan',['as'=>'adminKaryawan']);
    $routes->get('karyawan/add', 'Admin::addKaryawan',['as'=>'adminAddKaryawan']);
    $routes->post('karyawan/store', 'Admin::storeKaryawan',['as'=>'adminStoreKaryawan']);
    $routes->get('karyawan/edit/(:any)', 'Admin::editKaryawan/$1',['as'=>'adminEditKaryawan']);
    $routes->post('karyawan/update/(:any)', 'Admin::updateKaryawan/$1',['as'=>'adminUpdateKaryawan']);
    $routes->get('karyawan/delete/(:any)', 'Admin::deleteKaryawan/$1',['as'=>'adminDeleteKaryawan']);

    // $routes->post('hazard/report', 'Admin::exportHazardExcel',['as'=>'exportHazardExcel']);

});

// register
$routes->get('/register', 'Register::index',['as'=>'register']);
$routes->post('/register/process', 'Register::process');
//login
$routes->get('/login', 'Login::index',['as'=>'login']);
$routes->post('/login/process', 'Login::process',['as'=>'loginProcess']);
//logout
$routes->post('/logout', 'Login::logout');
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
