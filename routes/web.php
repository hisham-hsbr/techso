<?php

use Illuminate\Support\Facades\Route;


Route::get('/test', function () {
    return view('back_end.test.test');
});



require __DIR__.'/auth.php';





require __DIR__.'/back_end/back_end.php';
require __DIR__.'/front_end/front_end.php';
