<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $supportedLocales = ['en', 'fa'];
        $routeLocale = $request->route('locale');

        $locale = in_array($routeLocale, $supportedLocales, true) ? $routeLocale : 'en';

        app()->setLocale($locale);

        return $next($request);
    }
}


