<?php

use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {

    //customers
    Route::controller('Techso\CustomerController')->prefix('/admin/techso/masters/customers')->name('customers.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/update/{id}', 'update')->name('update');
        Route::post('/store', 'store')->name('store');
        Route::delete('/destroy{id}', 'destroy')->name('destroy');
        Route::get('/get', 'customersGet')->name('get');
        Route::get('/pdf/{id}', 'customersPDF')->name('pdf');
        Route::get('/import', 'customersImport')->name('import');
        Route::post('/upload', 'customersUpload')->name('upload');
        Route::get('/download', 'customersDownload')->name('download');
    });

    //brands
    Route::controller('Techso\BrandController')->prefix('/admin/techso/masters/brands')->name('brands.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/update/{id}', 'update')->name('update');
        Route::post('/store', 'store')->name('store');
        Route::delete('/destroy{id}', 'destroy')->name('destroy');
        Route::get('/get', 'brandsGet')->name('get');
        Route::get('/pdf/{id}', 'brandsPDF')->name('pdf');
        Route::get('/import', 'brandsImport')->name('import');
        Route::post('/upload', 'brandsUpload')->name('upload');
        Route::get('/download', 'brandsDownload')->name('download');
    });

    //complaints
    Route::controller('Techso\ComplaintController')->prefix('/admin/techso/masters/complaints')->name('complaints.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/update/{id}', 'update')->name('update');
        Route::post('/store', 'store')->name('store');
        Route::delete('/destroy{id}', 'destroy')->name('destroy');
        Route::get('/get', 'complaintsGet')->name('get');
        Route::get('/pdf/{id}', 'complaintsPDF')->name('pdf');
        Route::get('/import', 'complaintsImport')->name('import');
        Route::post('/upload', 'complaintsUpload')->name('upload');
        Route::get('/download', 'complaintsDownload')->name('download');
    });

    //jobStatuses
    Route::controller('Techso\JobStatusController')->prefix('/admin/techso/masters/job-statuses')->name('job-statuses.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/update/{id}', 'update')->name('update');
        Route::post('/store', 'store')->name('store');
        Route::delete('/destroy{id}', 'destroy')->name('destroy');
        Route::get('/get', 'jobStatusesGet')->name('get');
        Route::get('/pdf/{id}', 'jobStatusesPDF')->name('pdf');
        Route::get('/import', 'jobStatusesImport')->name('import');
        Route::post('/upload', 'jobStatusesUpload')->name('upload');
        Route::get('/download', 'jobStatusesDownload')->name('download');
    });

    //jobTypes
    Route::controller('Techso\JobTypeController')->prefix('/admin/techso/masters/job-types')->name('job-types.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/update/{id}', 'update')->name('update');
        Route::post('/store', 'store')->name('store');
        Route::delete('/destroy{id}', 'destroy')->name('destroy');
        Route::get('/get', 'jobTypesGet')->name('get');
        Route::get('/pdf/{id}', 'jobTypesPDF')->name('pdf');
        Route::get('/import', 'jobTypesImport')->name('import');
        Route::post('/upload', 'jobTypesUpload')->name('upload');
        Route::get('/download', 'jobTypesDownload')->name('download');
    });

    //productTypes
    Route::controller('Techso\ProductTypeController')->prefix('/admin/techso/masters/product-types')->name('product-types.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/update/{id}', 'update')->name('update');
        Route::post('/store', 'store')->name('store');
        Route::delete('/destroy{id}', 'destroy')->name('destroy');
        Route::get('/get', 'productTypesGet')->name('get');
        Route::get('/pdf/{id}', 'productTypesPDF')->name('pdf');
        Route::get('/import', 'productTypesImport')->name('import');
        Route::post('/upload', 'productTypesUpload')->name('upload');
        Route::get('/download', 'productTypesDownload')->name('download');
    });

    //products
    Route::controller('Techso\ProductController')->prefix('/admin/techso/masters/products')->name('products.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/update/{id}', 'update')->name('update');
        Route::post('/store', 'store')->name('store');
        Route::delete('/destroy{id}', 'destroy')->name('destroy');
        Route::get('/get', 'productsGet')->name('get');
        Route::get('/pdf/{id}', 'productsPDF')->name('pdf');
        Route::get('/import', 'productsImport')->name('import');
        Route::post('/upload', 'productsUpload')->name('upload');
        Route::get('/download', 'productsDownload')->name('download');
    });

    //customerAccessories
    Route::controller('Techso\CustomerAccessoriesController')->prefix('/admin/techso/masters/customer-accessories')->name('customer-accessories.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/update/{id}', 'update')->name('update');
        Route::post('/store', 'store')->name('store');
        Route::delete('/destroy{id}', 'destroy')->name('destroy');
        Route::get('/get', 'customerAccessoriesGet')->name('get');
        Route::get('/pdf/{id}', 'customerAccessoriesPDF')->name('pdf');
        Route::get('/import', 'customerAccessoriesImport')->name('import');
        Route::post('/upload', 'customerAccessoriesUpload')->name('upload');
        Route::get('/download', 'customerAccessoriesDownload')->name('download');
    });

    //services
    Route::controller('Techso\ServiceController')->prefix('/admin/techso/services')->name('services.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/update/{id}', 'update')->name('update');
        Route::post('/store', 'store')->name('store');
        Route::delete('/destroy{id}', 'destroy')->name('destroy');
        Route::get('/get', 'servicesGet')->name('get');
        Route::get('/pdf/{id}', 'servicesPDF')->name('pdf');
        Route::get('/import', 'servicesImport')->name('import');
        Route::post('/upload', 'servicesUpload')->name('upload');
        Route::get('/download', 'servicesDownload')->name('download');
    });





});
