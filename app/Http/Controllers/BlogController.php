<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('user')->latest()->get();
        return view('home', compact('blogs'));
    }

    public function create()
    {
        return view('blogpage');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('blogs', 'public');
    }

    $blog = new Blog($data);
    $blog->user()->associate(auth()->user());
    $blog->save();

    return redirect()->route('home')->with('success', 'Blog created successfully.');
}


    public function destroy(Blog $blog)
    {
        if ($blog->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $blog->delete();

        return redirect()->route('home')->with('success', 'Blog deleted successfully.');
    }

    public function edit(Blog $blog)
    {
        if (auth()->id() !== $blog->user_id) {
            abort(403);
        }

        return view('blogedit', compact('blog')); // use blogedit since it's not in a folder
    }

    public function update(Request $request, Blog $blog)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('blogs', 'public');
        $data['image'] = $imagePath;
    }

    $blog->update($data);

    return redirect('/')->with('success', 'Blog updated successfully.');
}




}
