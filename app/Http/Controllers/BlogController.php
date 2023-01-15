<?php

namespace App\Http\Controllers;

use App\Enums\BlogPostStatus;
use App\Models\BlogPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rules\Enum;
use Inertia\Response as InertiaResponse;
use Inertia\ResponseFactory;

class BlogController extends Controller {

    public function index (): InertiaResponse|ResponseFactory {
        return inertia(
            'Blog/Index',
            [
                'blogs' => BlogPost::all(),
            ]
        );
    }

    public function create (): ResponseFactory|InertiaResponse {
        return inertia('Blog/Create');
    }

    public function store (Request $request): RedirectResponse {
        BlogPost::create(
            $request->validate([
                'titleDE' => 'required|string|',
                'contentDE' => 'required|string',
                'seoKeywords' => 'required|string|',
                'status' => ['required', new Enum(BlogPostStatus::class)],
            ])
        );

        return redirect()->route('blog.index')->with('flashSuccess', 'BlogPost created');
    }

    public function show (BlogPost $blog, int $id): InertiaResponse|ResponseFactory {
        return inertia(
            'Blog/Show',
            [
                'blogPost' => $blog,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit ($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return Response
     */
    public function update (Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy ($id) {
        //
    }
}
