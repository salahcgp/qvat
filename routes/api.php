<?php

Route::group(['prefix' => '/v1', 'middleware' => ['auth:api'], 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::post('change-password', 'ChangePasswordController@changePassword')->name('auth.change_password');
    Route::apiResource('rules', 'RulesController', ['only' => ['index']]);
    Route::apiResource('sales-invoices', 'SalesInvoicesController');
    Route::apiResource('purchase-invoices', 'PurchaseInvoicesController');
    Route::apiResource('customers', 'CustomersController');
    Route::apiResource('suppliers', 'SuppliersController');
    Route::apiResource('create-companies', 'CreateCompaniesController');
    Route::apiResource('crm-statuses', 'CrmStatusesController');
    Route::apiResource('crm-customers', 'CrmCustomersController');
    Route::apiResource('crm-notes', 'CrmNotesController');
    Route::apiResource('crm-documents', 'CrmDocumentsController');
    Route::apiResource('permissions', 'PermissionsController');
    Route::apiResource('roles', 'RolesController');
    Route::apiResource('users', 'UsersController');
    Route::apiResource('teams', 'TeamsController');
});
