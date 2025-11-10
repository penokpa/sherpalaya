<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class ManageLocaleMddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->routeIs('website.change_locale')){
            $locale = Session::get('current_locale', 'en');
            if (! in_array($locale, ['en', 'fr'])) {
                $locale = 'en';
            }
            if (!App::isLocale($locale)) {
                App::setLocale($locale);
            }
        }

        return $next($request);
    }
}
