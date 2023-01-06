<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Inertia\Response;
use Inertia\ResponseFactory;

class AuthController extends Controller {

    public function create (): ResponseFactory|Response {
        return inertia('Auth/Login');
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store (Request $request): RedirectResponse {
        if (!Auth::attempt(
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]),
            true
        )) {
            throw ValidationException::withMessages([
                'email' => 'Authentication failed',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('landingpage.index')->with('flashMessageSuccess', 'Login success!');
    }

    public function logout (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landingpage.index')->with('flashMessageSuccess', 'Logout success!');
    }
}
