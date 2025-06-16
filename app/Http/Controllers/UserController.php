<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
    

        $incomingField = $request->validate([
            'name' => ['required', 'min:3', 'max:10'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:4', 'max:100'],
            'age' => ['required', 'integer', 'min:13', 'max:100'],
            'gender' => ['required', 'string']
        ]);
        

        $incomingField['password'] = bcrypt($incomingField['password']);
        $user = User::create($incomingField);
        auth()->login($user);
        return redirect('/home');
    }

    public function login(Request $request)
    {
        $incomingField = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:4', 'max:100']
        ]);

        $user = User::where('email', $incomingField['email'])->first();

        if ($user && Hash::check($incomingField['password'], $user->password)) {
            auth()->login($user); // Log in the user manually
            return redirect('/home');
        } else {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }

        /*if (auth()->attempt($incomingField)) {
            return redirect('/home');
        } else {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }*/

}
