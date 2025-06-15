<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request){
        $incomingFields = $request->validate([
            'name' => ['required', 'min:4','max:10'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:4', 'max:18'],
            'age' =>['required','integer', 'min:18'],
            'gender' => ['required', 'string', Rule::in('M', 'F')]
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        Auth::login($user);
        return redirect('/');
    }
        public function login(Request $request){
        $incomingFields = $request->validate([
            'loginemail' => ['required', 'email'],
            'loginpassword' => ['required','min:4', 'max:10']

        ]);

        if(Auth::attempt(['email' => $incomingFields['loginemail'], 'password' => $incomingFields['loginpassword']])){
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors([
            'loginemail' => 'The provided credentials do not match',
        ]);
    }
}
