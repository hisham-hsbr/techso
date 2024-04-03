<?php

use Illuminate\Support\Facades\Route;



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
    Route::post('/csdc/get', 'csdcsGet')->name('csdcs.get');
});
