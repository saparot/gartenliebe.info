<?php

namespace App\Http\Controllers;

use Inertia\Response;
use Inertia\ResponseFactory;

class LandingPageController extends Controller {

    public function index (): Response|ResponseFactory {
        return inertia('Landing', [
            'plantInfoCount' => 99,
        ]);
    }
}
