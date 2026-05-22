<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $blogs = Blog::with('user')->latest()->take(10)->get();
        // eager loading of blog along with user and also eager loading with reactions count
        $blogs = Blog::with('user')
            ->withCount([
                'reactions as likes_count' => function ($query) {
                    $query->where('type', 'like');
                },

                'reactions as dislikes_count' => function ($query) {
                    $query->where('type', 'dislike');
                },
            ])
            ->latest()->paginate(5);

        return view('home', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5120',
        ]);

        if ($request->hasFile('image')) {

            $validated['image'] = $request->file('image')->store('blogs', 'public');
        }

        auth()->user()->blogs()->create($validated);
        // dd($request->file('image'));

        return redirect('/')->with('success', 'Your Blog is posted!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('blogs.show', [
            'blog' => $blog,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $this->authorize('update', $blog);

        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //     if ($request->user()->cannot('update', $blog)) {
        //     abort(403);
        // }
        $this->authorize('update', $blog);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5120',
        ]);

        // dd($request->file('image'));

        // If new image uploaded
        if ($request->hasFile('image')) {

            // Delete old image if exists
            if ($blog->image) {

                Storage::disk('public')->delete($blog->image);

            }

            // Store new image
            $validated['image'] = $request->file('image')
                ->store('blogs', 'public');
        } else {
            // remove image field so old image stays untouched
            unset($validated['image']);
        }

        $blog->update($validated);

        return redirect('/')->with('success', 'Blog updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $this->authorize('delete', $blog);

        // Delete image if exists
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        // return redirect('/')->with('success', 'Blog Deleted');

        return response()->json([
            'success' => true,
            'message' => 'Blog Deleted Successfully',
        ]);

    }
}
