<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with("user")->latest()->paginate(4);

        return view("Post.index", [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view("Post.create");
    }

    public function store(Request $request)
    {

        $attributes = $request->validate([
            'title' => 'required|min:3|max:70',
            'description' => 'required|min:3|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $photo = $request->file("photo")->store('photos', 'public');

        $posts = Post::create([
            'title' => $attributes['title'],
            'description' => $attributes['description'],
            'photo_path' => $photo,
            'user_id' => Auth::id()]);

        return redirect("/");

    }

    public function show(Post $post)
    {
        return view("Post.show", ['post' => $post]);
    }

    public function edit(Post $post)
    {

        return view("Post.edit", ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $attributes = $request->validate([
            'title' => 'required|min:3|max:70',
            'description' => 'required|min:3|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('photo')) {

            if (Storage::disk('public')->exists($post->photo_path)) {
                Storage::disk('public')->delete($post->photo_path);
            }

            $photopath = $request->file('photo')->store('photos', 'public');

            $post->update([
                'title' => $attributes['title'],
                'description' => $attributes['description'],
                'photo_path' => $photopath,
            ]);
        } else {
            $post->update([
                'title' => $attributes['title'],
                'description' => $attributes['description'],
            ]);
        }

        return redirect('/post/' . $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect("/");
    }
}
