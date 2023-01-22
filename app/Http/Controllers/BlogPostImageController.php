<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostImageController extends Controller {

    public function create (BlogPost $blogPost) {
        return inertia(
            'BlogPost/Image/Create',
            ['blogPost' => $blogPost]
        );
    }

    public function store (BlogPost $blogPost, Request $request) {
        dd('works');
    }
}
