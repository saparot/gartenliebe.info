<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Response;
use Inertia\ResponseFactory;

class UserAuthController extends Controller {

    public function create (): Response|ResponseFactory {
        return inertia('UserAccount/Create');
    }

    public function store (Request $request): RedirectResponse {
        $user = User::create(
            $request->validate([
                'name' => 'required|string|min:2',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ])
        );

        Auth::login($user);

        return redirect()->route('landingpage.index')->with('flashMessageSuccess', 'Account created');
    }
}
