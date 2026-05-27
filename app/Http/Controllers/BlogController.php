<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Services\Blog\BlogService;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BlogController extends Controller
{

use AuthorizesRequests;

// private BlogService $service;
    public function __construct(private BlogService $service) {
        // $this->service = $service;
    }

    public function index()
    {
        $blogs = $this->service->getAllBlogs();
        return view('home', compact('blogs'));
    }

    public function search(Request $request)
    {
        $blogs = $this->service->searchBlogs($request->query('query'));

        return view('partials.blog-list', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function preview(Request $request)
{
    return view('blogs.preview', [
        'title' => $request->title,
        'content' => $request->content,
    ])->render();
}

    public function store(StoreBlogRequest $request)
    {
        $this->service->create($request->validated(), auth()->user());

        return redirect('/')->with('success', 'Blog created!');
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        $this->authorize('update', $blog);

        return view('blogs.edit', compact('blog'));
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $this->authorize('update', $blog);

        $this->service->update($blog, $request->validated());

        return redirect('/')->with('success', 'Blog updated!');
    }

    public function destroy(Blog $blog)
    {
        $this->authorize('delete', $blog);

        $this->service->delete($blog);

        return response()->json([
            'success' => true,
            'message' => 'Blog Deleted Successfully',
        ]);
    }
}