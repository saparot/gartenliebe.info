<?php

namespace App\Http\Controllers\Creator;

use App\Enums\BlogPostStatus;
use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rules\Enum;
use Inertia\Response as InertiaResponse;
use Inertia\ResponseFactory;

class CreatorBlogPostController extends Controller {

    public function index (): InertiaResponse|ResponseFactory {
        return inertia(
            'Creator/BlogPost/Index',
            [
                'blogs' => BlogPost::orderBy('id', 'DESC')->paginate(10),
            ]
        );
    }

    public function create (): ResponseFactory|InertiaResponse {
        return inertia('Creator/BlogPost/Create');
    }

    public function store (Request $request): RedirectResponse {
        BlogPost::create(
            $request->validate([
                'title_de' => 'required|string',
                'content_de' => 'required|string',
                'seo_keywords' => 'required|string',
                'status' => ['required', new Enum(BlogPostStatus::class)],
            ])
        );

        return redirect()->route('blog.index')->with('flashSuccess', 'BlogPost created');
    }

    public function show (BlogPost $blog): InertiaResponse|ResponseFactory {
        return inertia(
            'Creator/BlogPost/Show',
            [
                'blogPost' => $blog,
            ]
        );
    }

    public function edit (BlogPost $blog): InertiaResponse|ResponseFactory {
        return inertia(
            'Creator/BlogPost/Edit',
            [
                'blogPost' => $blog,
            ]
        );
    }

    public function update (Request $request, BlogPost $blog) {
        $blog->update(
            $request->validate([
                'title_de' => 'required|string',
                'content_de' => 'required|string',
                'seo_keywords' => 'required|string',
                'status' => ['required', new Enum(BlogPostStatus::class)],
            ])
        );

        return redirect()->route('blog.index')->with('flashSuccess', 'BlogPost updated');
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
