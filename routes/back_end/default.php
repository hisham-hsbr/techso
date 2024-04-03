<?php

use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {

    //Roles
    Route::controller('RoleController')->prefix('/admin/users-management/roles')->name('roles.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/update/{id}', 'update')->name('update');
        Route::post('/store', 'store')->name('store');
        Route::delete('/destroy{id}', 'destroy')->name('destroy');
    });

    //Permissions
    Route::controller('PermissionController')->prefix('/admin/users-management/permissions')->name('permissions.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/update/{id}', 'update')->name('update');
        Route::post('/store', 'store')->name('store');
        Route::delete('/destroy{id}', 'destroy')->name('destroy');
        Route::get('/get', 'permissionsGet')->name('get');
        Route::get('/import', 'permissionsImport')->name('import');
        Route::post('/upload', 'permissionsUpload')->name('upload');
        Route::get('/download', 'permissionsDownload')->name('download');
    });

    //Users
    Route::controller('UserController')->prefix('/admin/users-management/users')->name('users.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/update/{id}', 'update')->name('update');
        Route::post('/store', 'store')->name('store');
        Route::delete('/destroy{id}', 'destroy')->name('destroy');
        Route::get('/get', 'usersGet')->name('get');
        Route::post('/csdc/get', 'csdcsGet')->name('csdcs.get');
    });

    //Profile
    Route::controller('UserController')->prefix('/admin/profile')->name('profile.')->group(function () {
        Route::get('/', 'profileEdit')->name('edit');
        Route::patch('/', 'profileUpdate')->name('update');
        Route::delete('/', 'profileDestroy')->name('destroy');
        Route::patch('/avatar-update', 'avatarUpdate')->name('avatar-update');
        Route::patch('/avatar-delete', 'avatarDelete')->name('avatar-delete');
    });

    Route::get('/admin/profile', 'UserController@profileEdit')->name('profile.edit');
    Route::patch('/admin/profile', 'UserController@profileUpdate')->name('profile.update');
    Route::delete('/admin/profile', 'UserController@profileDestroy')->name('profile.destroy');

    //activity-logs
    Route::controller('ActivityLogController')->prefix('/admin/users-management/activity-logs')->name('activityLogs.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/get', 'activityLogsGet')->name('get');
    });

    //Bloods
    Route::controller('BloodController')->prefix('/admin/masters/bloods')->name('bloods.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/update/{id}', 'update')->name('update');
        Route::post('/store', 'store')->name('store');
        Route::delete('/destroy', 'destroy')->name('destroy');
        Route::get('/get', 'bloodsGet')->name('get');
    });

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
