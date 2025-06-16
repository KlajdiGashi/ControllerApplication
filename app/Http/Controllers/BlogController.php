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
        ]);

        $blog = new Blog($data);
        $blog->user()->associate(auth()->user()); 
        $blog->save();

        return redirect()->route('home')->with('success', 'Blog created successfully.');

    }
}
