<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        $locale = null;

        // 1. API (frontend)
        if ($request->header('Accept-Language')) {
            $locale = $request->header('Accept-Language');
        }

        // 2. WEB (session)
        if (!$locale) {
            $locale = Session::get('locale', 'ru');
        }

        if (!in_array($locale, ['ru', 'en', 'kz'])) {
            $locale = 'ru';
        }

        App::setLocale($locale);

        return $next($request);
    }
}
