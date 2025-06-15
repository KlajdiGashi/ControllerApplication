<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterAndLoginController extends Controller

{

   
    public function register(Request $request){
        $registerFields = $request->validate([
            'name'=>['required','max:20','min:2'],
            'email'=>['required','email', 'max:255'],
            'password'=>['required','min:8','max:20','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/'],
            'gender'=>'required',
            'age'=>['required', 'integer','min:13','max:55']


        ]);
      
        $registerFields['password'] = bcrypt($registerFields['password']);
        $user = User::create($registerFields);
     
        
      return redirect()->route('login',['success','Registered succesfully']);

}
public function login(Request $request){
    $loginFields=$request->validate([
       'email'=>['required','email', 'max:255'],
        'password'=>['required','min:8','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/']
        

    ]);
        $user = User::where('email', $loginFields['email'])->first();


    if(!$user){
            return 'this users doesnt exists !';
    }
    if (!Hash::check($loginFields['password'], $user->password)) {
        return 'Invalid password!';
    }

    return redirect()->route('home',['success','Registered succesfully']);
}


public function resetPassword(Request $request){
    $resetPasswordFields = $request->validate([
        'email'=>['required','email', 'max:255'],
        'newPassword'=>['required','min:8','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/'],
        'confirmNewPassword'=>['required','same:newPassword']
    ]);
     $user = User::where('email', $resetPasswordFields['email'])->first();
     if(!$user){
            return 'this users doesnt exists !';
    }
    $user->password = bcrypt($resetPasswordFields['newPassword']);
    $user->save();

    return redirect()->route('login',['success','Registered succesfully']);
}
}
