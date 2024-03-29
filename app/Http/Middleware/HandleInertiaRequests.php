<?php

namespace App\Http\Middleware;

use Exception;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware {

    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return string|null
     */
    public function version (Request $request): ?string {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array<string, array<string>>
     */
    public function share (Request $request): array {
        return array_merge(parent::share($request), [
            'projectName' => env('APP_NAME'),
            'locale' => app()->getLocale(),
            'languageSnippets' => $this->getLanguageSnippetsAll(),
            'flashMessage' => [
                'success' => $request->session()->get('flashMessageSuccess'),
                'warning' => $request->session()->get('flashMessageWarning'),
                'error' => $request->session()->get('flashMessageError'),
            ],
            'cookieName' => self::getCookieName(),
            'forceCookieConsent' => $this->isCookieConsentForced($request),
            'isLoggedIn' => (bool) $request->user(),
            'isCreator' => (bool) $request->user(),
            'user' => $request->user() ? [
                'id' => $request->user()->id,
                'name' => $request->user()->name,
                'email' => $request->user()->email,
            ] : null,
        ]);
    }

    /**
     * this may result in a hughe amount of data, should be optimized once
     *
     * @return array<string, string>
     * @throws Exception
     */
    private function getLanguageSnippetsAll (): array {
        $path = resource_path(sprintf('lang/%s.json', app()->getLocale()));
        if (!file_exists($path)) {
            return [];
        }

        $result = json_decode(file_get_contents($path) ?: '', true);
        if (json_last_error() || empty($result)) {
            throw new Exception(sprintf('failed to parse translations for language %s', app()->getLocale()));
        }

        return $result;
    }

    private function isCookieConsentForced (Request $request): bool {
        return empty($request->cookie(self::getCookieName()));
    }

    static public function getCookieName (): string {
        return preg_replace('/[^\da-z]/i', '', trim(mb_strtolower(env('APP_NAME'))));
    }
}
