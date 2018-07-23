<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IdentifyLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        app()->setLocale(
            $this->identifyLocale($request)
        );

        return $next($request);
    }

    public function identifyLocale(Request $request): string
    {
        $requestLocale = $request->server('HTTP_ACCEPT_LANGUAGE');
        $sessionLocale = session()->get('locale');

        if ($sessionLocale === 'ru' || $sessionLocale === 'en') {
            return $sessionLocale;
        }

        if ( ! is_string($requestLocale) || ! Str::startsWith($requestLocale, 'ru') ) {
            return 'ru';
        }

        return 'en';
    }
}
