<?php

use Illuminate\Support\Facades\Route;





Route::get('lang/{lang}', function ($lang) {
    app()->setLocale($lang);
    session()->put('locale', $lang);
    return redirect()->route('back-end.dashboard');
})->name('lang');


Route::get('/test', function () {
    return view('back_end.test.test');
});



require __DIR__ . '/auth.php';





require __DIR__ . '/back_end/back_end.php';
require __DIR__ . '/front_end/front_end.php';
