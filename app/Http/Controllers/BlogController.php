<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;


class BlogController extends Controller
{
    public function storeBlog(Request $request)
    {
        $Values = $request->validate([
            'title' => 'required|min:5|max:20',
            'description' => 'required|min:5|max:255',
        ]);
    
        if (!Auth::check()) {
            return redirect('/login')->withErrors('You must be logged in to create a blog.');
        }
    
        // Create blog with fillable fields only
        $blog = new Blog($Values);
    
        // Set user_id manually (not mass-assigned)
        $blog->user_id = Auth::id();
    
        // Save to database
        $blog->save();
    
        return redirect('/');
    }
    
    
}
