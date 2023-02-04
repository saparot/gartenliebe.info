<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Inertia\Response as InertiaResponse;
use Inertia\ResponseFactory;

class BlogPostController extends Controller {

    public function index (): InertiaResponse|ResponseFactory {
        return inertia(
            'BlogPost/Index',
            [
                'blogs' => BlogPost::orderBy('id', 'DESC')->paginate(10),
            ]
        );
    }

    public function show (BlogPost $blog): InertiaResponse|ResponseFactory {
        return inertia(
            'BlogPost/Show',
            [
                'blogPost' => $blog,
            ]
        );
    }
}
