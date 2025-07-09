<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //

    public function profile(User $user) {

        $books = [];

        if(auth()->user()->id === $user['id']){

            $books = auth()->user()->getPosts()->latest()->get();
            return view('profile', ['user' => $user, 'books' => $books]);
        }

        return redirect('/home');
        
    }

    public function register(Request $request){

        $incoming = $request->validate([
            'username' => ['required', 'min:3', 'max:30', Rule::unique('users', 'username')],
            'password' => ['required', 'min:3', 'max:200'],
            'role' => ['required']
        ]);

        $incoming['password'] = bcrypt($incoming['password']);

        $user = User::create($incoming);

        auth()->guard()->login($user);

        return redirect('/home');
        
    }

    public function login(Request $request){

        $incoming = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt(['username' => $incoming['username'], 'password' => $incoming['password']])){
            $request->session()->regenerate();
            return redirect('/home');
        }

        return redirect('/');
        
    }


    public function logout(){

        if(auth()->check()){
            auth()->logout();
        }
        return redirect('/');
    }
}
