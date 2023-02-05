<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogPostImage;
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

    public function store (BlogPost $blog, Request $request) {
        if (!$request->hasFile('images')) {
            return redirect()->back()->with('flashMessageError', 'No images found');
        }

        foreach ($request->file('images') as $file) {
            $path = $file->store('images', 'public');
            $blog->images()->save(
                new BlogPostImage([
                    'filename' => $path,
                ])
            );
        }

        return redirect()->back()->with('flashMessageSuccess', 'Images are uploaded');
    }
}
