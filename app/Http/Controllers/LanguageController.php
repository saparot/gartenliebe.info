<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LanguageController extends Controller {

    private const LOCALES_SUPPORTED = ['de', 'en'];

    public function languageSwitch (Request $request): RedirectResponse {
        if ($this->isValidLocale($request)) {
            Session()->put('locale', $request->query('locale'));
        }

        return redirect()->back();
    }

    private function isValidLocale (Request $request): bool {
        return in_array($request->query('locale'), self::LOCALES_SUPPORTED);
    }
}
