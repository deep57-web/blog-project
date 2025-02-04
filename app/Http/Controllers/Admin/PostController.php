<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Display a listing of posts.
    public function index()
    {
        $posts = Post::with('category')->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    // Show the form for creating a new post.
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    // Store a newly created post in storage.
    public function store(Request $request)
    {
        $request->validate([
            'title'            => 'required|max:255',
            'description'      => 'required',
            'meta_title'       => 'nullable|max:255',
            'meta_description' => 'nullable',
            'category_id'      => 'nullable|exists:categories,id',
        ]);

        Post::create($request->all());

        return redirect()->route('admin.posts.index')
                         ->with('success', 'Post created successfully.');
    }

    // Show the form for editing the specified post.
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    // Update the specified post in storage.
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'            => 'required|max:255',
            'description'      => 'required',
            'meta_title'       => 'nullable|max:255',
            'meta_description' => 'nullable',
            'category_id'      => 'nullable|exists:categories,id',
        ]);

        $post->update($request->all());

        return redirect()->route('admin.posts.index')
                         ->with('success', 'Post updated successfully.');
    }

    // Remove the specified post from storage.
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')
                         ->with('success', 'Post deleted successfully.');
    }
}
