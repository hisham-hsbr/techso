<?php

use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/job', function () {
    return view('front_end.tr');
});

Route::get('/track-job-number', 'FrontendDashboardController@trackSearchJob')->name('track-job-number');
Route::get('/track-phone-number', 'FrontendDashboardController@trackSearchPhone')->name('track-phone-number');
Route::get('/portfolio-details/{id}', 'FrontendDashboardController@portfolioDetails')->name('portfolio-details');



// Route::get('/blood-bank', 'Fixancare\BloodBankController@index')->name('blood-bank');


Route::controller('Fixancare\BloodBankController')->prefix('/blood-bank')->name('blood-bank.')->group(function () {
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
