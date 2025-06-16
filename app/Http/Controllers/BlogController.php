<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\blog;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function storeBlog(Request $request){
        $values = $request -> validate([
            'title' =>'required|max:20', 'description'=>'required|min:4|max:500'
        ]);

        $values['user_id'] = Auth::id();
        Blog::create($values);
        
        return redirect('/storeBlog');

    }

}