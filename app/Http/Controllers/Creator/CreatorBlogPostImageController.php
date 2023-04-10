<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogPostImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class CreatorBlogPostImageController extends Controller {

    public function create (BlogPost $blog): Response|ResponseFactory {
        return inertia(
            'Creator/BlogPost/Image/Create',
            ['blog' => $blog]
        );
    }

    public function store (BlogPost $blog, Request $request): RedirectResponse {
        if (!$request->hasFile('images')) {
            return redirect()->back()->with('flashMessageError', 'No images found');
        }

        array_map(fn($file) => $blog->images()->save(
            new BlogPostImage([
                'filename' => $file->store('images', 'public'),
            ])
        ), $request->file('images'));

        return redirect()->back()->with('flashMessageSuccess', 'Images are uploaded');
    }
}
