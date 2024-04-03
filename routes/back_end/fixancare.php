<?php

use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {

    //mobile services
    Route::controller('Fixancare\MobileServiceController')->prefix('/admin/fixancare/mobile-services')->name('mobile-services.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/update/{id}', 'update')->name('update');
        Route::post('/store', 'store')->name('store');
        Route::delete('/destroy{id}', 'destroy')->name('destroy');
        Route::get('/get', 'mobileServicesGet')->name('get');
        Route::get('/pdf/{id}', 'mobileServicesPDF')->name('pdf');
        Route::get('/import', 'mobileServicesImport')->name('import');
        Route::post('/upload', 'mobileServicesUpload')->name('upload');
        Route::get('/download', 'mobileServicesDownload')->name('download');
    });

     //image
     Route::controller('Fixancare\ImageController')->prefix('/admin/fixancare/images')->name('images.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::get('/show/{id}', 'show')->name('show');
        Route::patch('/update/{id}', 'update')->name('update');
        Route::post('/store', 'store')->name('store');
        Route::delete('/destroy{id}', 'destroy')->name('destroy');
        Route::get('/get', 'imagesGet')->name('get');
        Route::get('/import', 'imageImport')->name('import');
        Route::post('/upload', 'imageUpload')->name('upload');
        Route::get('/download', 'imageDownload')->name('download');
    });

    //FrontEndData
    Route::controller('Fixancare\FrontEndDataController')->prefix('/admin/fixancare/front-end-data')->name('front-end-data.')->group(function () {
        Route::get('/home-carousel', 'homeCarouselShow')->name('home-carousel-show');
        // Route::get('/home-carousel', 'homeCarouselUpdate')->name('home-carousel-update');
        // Route::get('/create', 'create')->name('create');
        // Route::get('/edit/{id}', 'edit')->name('edit');
        // Route::patch('/update/{id}', 'update')->name('update');
        // Route::post('/store', 'store')->name('store');
        // Route::delete('/destroy{id}', 'destroy')->name('destroy');
        // Route::get('/get', 'mobileServicesGet')->name('get');
        // Route::get('/import', 'mobileServicesImport')->name('import');
        // Route::post('/upload', 'mobileServicesUpload')->name('upload');
        // Route::get('/download', 'mobileServicesDownload')->name('download');
    });

    //job types
    Route::controller('Fixancare\JobTypeController')->prefix('/admin/fixancare/masters/job-types')->name('job-types.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/update/{id}', 'update')->name('update');
        Route::post('/store', 'store')->name('store');
        Route::delete('/destroy{id}', 'destroy')->name('destroy');
        Route::get('/get', 'jobTypesGet')->name('get');
        Route::get('/import', 'jobTypesImport')->name('import');
        Route::post('/upload', 'jobTypesUpload')->name('upload');
        Route::get('/download', 'jobTypesDownload')->name('download');
    });

    //mobile complaints
    Route::controller('Fixancare\MobileComplaintController')->prefix('/admin/fixancare/masters/mobile-complaints')->name('mobile-complaints.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/update/{id}', 'update')->name('update');
        Route::post('/store', 'store')->name('store');
        Route::delete('/destroy{id}', 'destroy')->name('destroy');
        Route::get('/get', 'mobileComplaintsGet')->name('get');
        Route::get('/import', 'mobileComplaintsImport')->name('import');
        Route::post('/upload', 'mobileComplaintsUpload')->name('upload');
        Route::get('/download', 'mobileComplaintsDownload')->name('download');
    });
    //work status
    Route::controller('Fixancare\WorkStatusController')->prefix('/admin/fixancare/masters/work-statuses')->name('work-statuses.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/update/{id}', 'update')->name('update');
        Route::post('/store', 'store')->name('store');
        Route::delete('/destroy{id}', 'destroy')->name('destroy');
        Route::get('/get', 'workStatusesGet')->name('get');
        Route::get('/import', 'workStatusesImport')->name('import');
        Route::post('/upload', 'workStatusesUpload')->name('upload');
        Route::get('/download', 'workStatusesDownload')->name('download');
    });
    //job status
    Route::controller('Fixancare\JobStatusController')->prefix('/admin/fixancare/masters/job-statuses')->name('job-statuses.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/update/{id}', 'update')->name('update');
        Route::post('/store', 'store')->name('store');
        Route::delete('/destroy{id}', 'destroy')->name('destroy');
        Route::get('/get', 'jobStatusesGet')->name('get');
        Route::get('/import', 'jobStatusesImport')->name('import');
        Route::post('/upload', 'jobStatusesUpload')->name('upload');
        Route::get('/download', 'jobStatusesDownload')->name('download');
    });

    //mobile models
    Route::controller('Fixancare\MobileModelController')->prefix('/admin/fixancare/masters/mobile-models')->name('mobile-models.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/update/{id}', 'update')->name('update');
        Route::post('/store', 'store')->name('store');
        Route::delete('/destroy{id}', 'destroy')->name('destroy');
        Route::get('/get', 'mobileModelsGet')->name('get');
        Route::get('/import', 'mobileModelsImport')->name('import');
        Route::post('/upload', 'mobileModelsUpload')->name('upload');
        Route::get('/download', 'mobileModelsDownload')->name('download');
    });

    //brands
    Route::controller('Fixancare\BrandController')->prefix('/admin/fixancare/masters/brands')->name('brands.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/update/{id}', 'update')->name('update');
        Route::post('/store', 'store')->name('store');
        Route::delete('/destroy{id}', 'destroy')->name('destroy');
        Route::get('/get', 'brandGet')->name('get');
        Route::get('/import', 'brandImport')->name('import');
        Route::post('/upload', 'brandUpload')->name('upload');
        Route::get('/download', 'brandDownload')->name('download');
    });




});
