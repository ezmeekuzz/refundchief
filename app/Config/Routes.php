<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('admin', function($routes) {
    $routes->get('/', 'Admin\DashboardController::index');
    $routes->get('dashboard', 'Admin\DashboardController::index');
    $routes->get('audit-dashboard', 'Admin\AuditDashboardController::index');
    $routes->get('reimbursement-dashboard', 'Admin\ReimbursementDashboardController::index');
    $routes->get('add-store', 'Admin\AddStoreController::index');
    $routes->get('store-masterlist', 'Admin\StoreMasterlistController::index');
    $routes->get('store-log-history', 'Admin\StoreLogHistoryController::index');
    $routes->get('commission-report', 'Admin\CommissionReportController::index');
    $routes->get('inbound-follow-up-cases', 'Admin\InboundFollowUpCasesController::index');
    $routes->get('outstanding-cases-count', 'Admin\OutstandingCasesCountController::index');
    $routes->get('reimbursement-daily', 'Admin\ReimbursementDailyController::index');
    $routes->get('reversal-reports', 'Admin\ReversalReportsController::index');
    $routes->get('user-report', 'Admin\UserReportController::index');
    $routes->get('confirmed-documents', 'Admin\ConfirmedDocumentsController::index');
    $routes->get('add-user', 'Admin\AddUserController::index');
    $routes->post('adduser/insert', 'Admin\AddUserController::insert');
    $routes->get('user-masterlist', 'Admin\UserMasterlistController::index');
    $routes->post('usermasterlist/getData', 'Admin\UserMasterlistController::getData');
    $routes->delete('usermasterlist/delete/(:num)', 'Admin\UserMasterlistController::delete/$1');
    $routes->get('edit-user/(:num)', 'Admin\EditUserController::index/$1');
    $routes->post('edituser/update', 'Admin\EditUserController::update');
    $routes->get('add-merchant', 'Admin\AddMerchantController::index');
    $routes->post('addmerchant/insert', 'Admin\AddMerchantController::insert');
    $routes->get('login', 'Admin\LoginController::index');
    $routes->get('logout', 'Admin\LogoutController::index');
    $routes->post('login/authenticate', 'admin\LoginController::authenticate');
    $routes->get('merchant-masterlist', 'Admin\MerchantMasterlistController::index');
    $routes->post('merchantmasterlist/getData', 'Admin\MerchantMasterlistController::getData');
    $routes->delete('merchantmasterlist/delete/(:num)', 'Admin\MerchantMasterlistController::delete/$1');
    $routes->get('edit-merchant/(:num)', 'Admin\EditMerchantController::index/$1');
    $routes->post('editmerchant/update', 'Admin\EditMerchantController::update');
    $routes->post('addstore/insert', 'Admin\AddStoreController::insert');
    $routes->post('storemasterlist/getData', 'Admin\StoreMasterlistController::getData');
    $routes->delete('storemasterlist/delete/(:num)', 'Admin\StoreMasterlistController::delete/$1');
    $routes->get('edit-store/(:num)', 'Admin\EditStoreController::index/$1');
    $routes->post('editstore/update', 'Admin\EditStoreController::update');
});

$routes->get('/', 'HomeController::index');

