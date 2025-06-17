<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $field = $request->validate([
            'name' => ['required', 'min:3', 'max:10'],
            'email'=> ['required', 'email', Rule::unique('users', 'email')],
            'password'=> ['required', 'min:8', 'max:100'],
            'age'=> ['required', 'integer', 'min:16', 'max:100'],
            'gender' => ['required'],
        ]);

        

        $field['password'] = bcrypt($field['password']);
        $user = User::create($field);

        auth()->login($user);

        return redirect('/')->with('message', 'Registration successful!');
    }

    public function login(Request $request)
    {
        $field = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($field)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'Logged in successfully!');
        } else {
            return back()->withErrors([
                'email' => 'The email or password are incorrect',
            ])->withInput();
        }
    }

    public function index()
    {
        $user = auth()->user();
        return view('home', compact('user'));
    }
}
