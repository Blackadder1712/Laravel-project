<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\User;

class UserController extends Controller
{
    //Show Register/Create form 
    public function create()
    {
        return view('users.register');
    }

    //create new users 
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6' 
        ]);

        //hash password 
        $formFields['password'] = bcrypt($formFields['password']);

        //create then login

        $user = User::create($formFields);
        auth()->login($user);

        return redirect("/")->with("message", "User created and logged in ");

    }

    //Logout User
    public function logout(Request $request) //remove auth info
    {
        auth()->logout();
        $request->session()->invalidate();//end sesh
        $request->session()->regenerateToken(); ///new crsf

        return redirect('/')->with('message', 'You have been logged out');
    }

    //dhow login form 

    public function login()
    {
        return view('users.login');
    }

    //authenticate user
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([ //check email and password 
            'email' => ['required', 'email'],
            'password' => 'required' 
        ]);

        if(auth()->attempt($formFields))
        {
            $request->session()->regenerate();//regenerate session id

            return redirect('/')->with('message', 'You are now logged in'); //login 

        }

        return back()->withErrors(['email'=> 'Invalid credentials'])->onlyInput('email'); // if login fails 
    }
}
