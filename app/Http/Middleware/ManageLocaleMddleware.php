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

        // Get the route locale prefix
        $prefix = $request->route('locale', 'en');

        if (! in_array($prefix, ['en', 'fr'])) {
            $prefix = 'en';
        }

        // Store it in the request (optional)
        $request->attributes->set('locale', $prefix);


        // Set locale
        if (!$request->routeIs('website.change_locale')) {
            if (!App::isLocale($prefix)) {
                App::setLocale($prefix);
            }
        }


        $response = $next($request);

        return $response;
    }
}
