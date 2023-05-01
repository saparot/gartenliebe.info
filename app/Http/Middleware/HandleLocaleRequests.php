<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HandleLocaleRequests {

    private const LOCALES_SUPPORTED = ['en', 'de']; //first record is used as default when language is not supported
    private const SESSION_KEY_LOCALE = 'locale';

    public function handle (Request $request, Closure $next): mixed {
        if (!session()->has(self::SESSION_KEY_LOCALE)) {
            session()->put(self::SESSION_KEY_LOCALE, $this->localeAutoDetect($request));
        }

        $locale = session()->has('locale') ? session('locale') : config('app.locale');
        app()->setLocale($locale);

        return $next($request);
    }

    private function localeAutoDetect (Request $request): string {
        return $request->getPreferredLanguage(self::LOCALES_SUPPORTED);
    }
}
