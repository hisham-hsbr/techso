<?php

use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('front_end.welcome');
// });

Route::get('/', 'Fixancare\FrontEndDataController@index')->name('front-end.index');
