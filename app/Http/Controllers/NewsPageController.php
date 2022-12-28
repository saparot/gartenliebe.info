<?php

namespace App\Http\Controllers;

use Inertia\Response;
use Inertia\ResponseFactory;

class NewsPageController extends Controller {

    public function index (): Response|ResponseFactory {
        return inertia('News');
    }
}
