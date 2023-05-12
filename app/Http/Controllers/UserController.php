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
}
