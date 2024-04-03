<?php

use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {

    //Developer Settings
    Route::controller('DeveloperSettingsController')->prefix('/developer/settings/developer-settings')->name('developer-settings.')->group(function () {
        Route::get('/', 'developerIndex')->name('index');
        Route::patch('/update', 'developerUpdate')->name('update');
        Route::patch('/favicon-update', 'faviconUpdate')->name('favicon-update');
        Route::patch('/logo-black-update', 'logoBlackUpdate')->name('logo-black-update');
        Route::patch('/logo-white-update', 'logoWhiteUpdate')->name('logo-white-update');
    });
    //App Settings
    Route::controller('AppSettingsController')->prefix('/developer/settings/app-settings')->name('app-settings.')->group(function () {
        Route::get('/', 'appIndex')->name('index');
        Route::patch('/update', 'appUpdate')->name('update');
    });

    //Admin Settings
    Route::controller('AdminSettingsController')->prefix('/admin/settings/admin-settings')->name('admin-settings.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::patch('/update', 'update')->name('update');
    });

        //Blood Bank Settings
        Route::controller('AppSettingsController')->prefix('/admin/settings/blood-bank-settings')->name('blood-bank-settings.')->group(function () {
            Route::get('/', 'bloodBankIndex')->name('index');
            Route::patch('/update', 'bloodBankUpdate')->name('update');
        });



});
