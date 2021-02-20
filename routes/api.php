<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Asset Categories
    Route::apiResource('asset-categories', 'AssetCategoryApiController');

    // Asset Locations
    Route::apiResource('asset-locations', 'AssetLocationApiController');

    // Asset Statuses
    Route::apiResource('asset-statuses', 'AssetStatusApiController');

    // Assets
    Route::post('assets/media', 'AssetApiController@storeMedia')->name('assets.storeMedia');
    Route::apiResource('assets', 'AssetApiController');

    // Assets Histories
    Route::apiResource('assets-histories', 'AssetsHistoryApiController', ['except' => ['store', 'show', 'update', 'destroy']]);

    // Task Statuses
    Route::apiResource('task-statuses', 'TaskStatusApiController');

    // Task Tags
    Route::apiResource('task-tags', 'TaskTagApiController');

    // Tasks
    Route::post('tasks/media', 'TaskApiController@storeMedia')->name('tasks.storeMedia');
    Route::apiResource('tasks', 'TaskApiController');

    // Expense Categories
    Route::apiResource('expense-categories', 'ExpenseCategoryApiController');

    // Income Categories
    Route::apiResource('income-categories', 'IncomeCategoryApiController');

    // Expenses
    Route::apiResource('expenses', 'ExpenseApiController');

    // Incomes
    Route::apiResource('incomes', 'IncomeApiController');

    // Time Work Types
    Route::apiResource('time-work-types', 'TimeWorkTypeApiController');

    // Time Projects
    Route::apiResource('time-projects', 'TimeProjectApiController');

    // Time Entries
    Route::apiResource('time-entries', 'TimeEntryApiController');

    // Invoice Types
    Route::apiResource('invoice-types', 'InvoiceTypeApiController');

    // Nic Types
    Route::apiResource('nic-types', 'NicTypeApiController');

    // Countries
    Route::apiResource('countries', 'CountriesApiController');

    // Districts
    Route::apiResource('districts', 'DistrictApiController');

    // Divisional Secretariats
    Route::apiResource('divisional-secretariats', 'DivisionalSecretariatApiController');

    // Grama Niladari Divisions
    Route::apiResource('grama-niladari-divisions', 'GramaNiladariDivisionApiController');

    // Photo Sizes
    Route::apiResource('photo-sizes', 'PhotoSizeApiController');

    // Visa Background Colors
    Route::apiResource('visa-background-colors', 'VisaBackgroundColorApiController');

    // Paper Types
    Route::apiResource('paper-types', 'PaperTypeApiController');

    // Order Statuses
    Route::apiResource('order-statuses', 'OrderStatusApiController');
});
