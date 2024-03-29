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
$routes->get('/', 'Home::index');

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

$routes->group('admin', function ($routes) {

    $routes->resource('empresas', [
        'filter' => 'permission:empresas-permisos',
        'controller' => 'EmpresasController',
        'except' => 'show'
    ]);

    $routes->post('empresas/save', 'EmpresasController::save');
    $routes->post('empresas/obtenerEmpresa', 'EmpresasController::obtenerEmpresa');

    $routes->resource('branchoffices', [
        'filter' => 'permission:branchoffices-permission',
        'controller' => 'branchofficesController',
        'except' => 'show'
    ]);

    $routes->post('branchoffices/save', 'BranchofficesController::save');
    $routes->post('branchoffices/getBranchoffices', 'BranchofficesController::getBranchoffices');

    $routes->resource('departments', [
        'filter' => 'permission:departments-permission',
        'controller' => 'departmentsController',
        'except' => 'show'
    ]);

    $routes->post('departments/save', 'DepartmentsController::save');
    $routes->post('departments/getDepartments', 'DepartmentsController::getDepartments');

    $routes->resource('categories', [
        'filter' => 'permission:categories-permission',
        'controller' => 'categoriesController',
        'except' => 'show'
    ]);

    $routes->resource('usuariosempresa', [
        'filter' => 'permission:usuariosempresa-permission',
        'controller' => 'usuariosempresaController',
        'except' => 'show'
    ]);
    $routes->post('usuariosempresa/save', 'UsuariosempresaController::save');
    $routes->post('usuariosempresa/getUsuariosempresa', 'UsuariosempresaController::getUsuariosempresa');

    $routes->get('empresa/usuariosPorEmpresa/(:any)', 'EmpresasController::usuariosPorEmpresa/$1');
    $routes->post('empresa/activarDesactivar', 'EmpresasController::activarDesactivar');

    $routes->post('categories/save', 'CategoriesController::save');
    $routes->post('categories/getCategories', 'CategoriesController::getCategories');

    $routes->resource('holidays', [
        'filter' => 'permission:holidays-permission',
        'controller' => 'holidaysController',
        'except' => 'show'
    ]);

    $routes->post('holidays/save', 'HolidaysController::save');
    $routes->post('holidays/getHolidays', 'HolidaysController::getHolidays');

    $routes->resource('costcenter', [
        'filter' => 'permission:costcenter-permission',
        'controller' => 'costcenterController',
        'except' => 'show'
    ]);

    $routes->post('costcenter/save', 'CostcenterController::save');
    $routes->post('costcenter/getCostcenter', 'CostcenterController::getCostcenter');

    $routes->resource('additionalfeaturespeople', [
        'filter' => 'permission:additionalfeaturespeople-permission',
        'controller' => 'additionalfeaturespeopleController',
        'except' => 'show'
    ]);

    $routes->post('additionalfeaturespeople/save', 'AdditionalfeaturespeopleController::save');
    $routes->post('additionalfeaturespeople/getAdditionalfeaturespeople', 'AdditionalfeaturespeopleController::getAdditionalfeaturespeople');

    $routes->resource('turns', [
        'filter' => 'permission:turns-permission',
        'controller' => 'turnsController',
        'except' => 'show'
    ]);

    $routes->post('turns/save', 'TurnsController::save');
    $routes->post('turns/getTurns', 'TurnsController::getTurns');

    $routes->resource('perceptionsanddeductions', [
        'filter' => 'permission:perceptionsanddeductions-permission',
        'controller' => 'perceptionsanddeductionsController',
        'except' => 'show'
    ]);

    $routes->post('perceptionsanddeductions/save', 'PerceptionsanddeductionsController::save');
    $routes->post('perceptionsanddeductions/getPerceptionsanddeductions', 'PerceptionsanddeductionsController::getPerceptionsanddeductions');

    $routes->resource('tiponomina', [
        'filter' => 'permission:tiponomina-permission',
        'controller' => 'tiponominaController',
        'except' => 'show'
    ]);

    $routes->post('tiponomina/save', 'TiponominaController::save');
    $routes->post('tiponomina/getTiponomina', 'TiponominaController::getTiponomina');

    $routes->get('generateCRUD/(:any)', 'AutoCrudController::index/$1');

    $routes->resource('employees', [
        'filter' => 'permission:employees-permission',
        'controller' => 'employeesController',
        'except' => 'show'
    ]);

    $routes->post('employees/save', 'EmployeesController::save');
    $routes->post('employees/getEmployees', 'EmployeesController::getEmployees');

    $routes->resource('banks', [
        'filter' => 'permission:banks-permission',
        'controller' => 'banksController',
        'except' => 'show'
    ]);

    $routes->post('banks/save', 'BanksController::save');
    $routes->post('banks/getBanks', 'BanksController::getBanks');

    $routes->post('sucursales/getSucursalesAjax', 'BranchofficesController::getSucursalesAjax');
    $routes->get('sucursales/usuariosPorSucursal/(:any)', 'BranchofficesController::usuariosPorSucursal/$1');

    $routes->post('sucursales/activarDesactivar', 'BranchofficesController::activarDesactivar');

    $routes->post('ubicaciones/getEstadosSATAjax', 'BranchofficesController::getEstadosSAT');

    $routes->resource('riesgoslaborales', [
        'filter' => 'permission:riesgoslaborales-permission',
        'controller' => 'riesgoslaboralesController',
        'except' => 'show'
    ]);

    $routes->post('riesgoslaborales/save', 'RiesgoslaboralesController::save');
    $routes->post('riesgoslaborales/getRiesgoslaborales', 'RiesgoslaboralesController::getRiesgoslaborales');

    $routes->resource('salariosminimos', [
        'filter' => 'permission:salariosminimos-permission',
        'controller' => 'salariosminimosController',
        'except' => 'show'
    ]);
    $routes->post('salariosminimos/save', 'SalariosminimosController::save');
    $routes->post('salariosminimos/getSalariosminimos', 'SalariosminimosController::getSalariosminimos');

    $routes->resource('nominas', [
        'filter' => 'permission:nominas-permission',
        'controller' => 'nominasController',
        'except' => 'show'
    ]);

    $routes->post('nominas/save', 'NominasController::save');
    $routes->post('nominas/getNominas', 'NominasController::getNominas');

    $routes->get('tiposNomina/usuariosPorTipoNomina/(:any)', 'TiponominaController::usuariosPorTipoNomina/$1');

    $routes->post('tiposNominasPorUsuario/activarDesactivar', 'Usuarios_tiposnominaController::activarDesactivar');

    $routes->post('nominas/obtenerUltimoFolio', 'NominasController::ultimoFolio');

    $routes->resource('tiposcalculos', [
        'filter' => 'permission:tiposcalculos-permission',
        'controller' => 'tiposcalculosController',
        'except' => 'show'
    ]);
    $routes->post('tiposcalculos/save', 'TiposcalculosController::save');
    $routes->post('tiposcalculos/getTiposcalculos', 'TiposcalculosController::getTiposcalculos');
});

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
