<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (session()->has('locale')) {
        //     app()->setLocale(session()->get('locale'));
        // }

        // Assuming the locale is stored in session
        if (Session::has('locale')) {
            $locale = Session::get('locale');
        } else {
            $locale = config('app.locale'); // default locale
        }

        App::setLocale($locale);






        return $next($request);
    }
}