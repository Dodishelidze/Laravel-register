<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function Registration(Request $request)
    {
        // validation
        $data = $request->validate([
            'name' => 'required|string|min:5',
            'email' => 'required|string|unique:users,email|email',
            'password_' => ['required', 'min:8', 'regex:/(?=.*\d)(?=.*[a-z].*[a-z])(?=.*[A-Z].*[A-Z])(?=.*\W)/'],
            'country' => 'required',
            'birthday' => 'required|date|before:-18 years',
        ]);

        // user registration
        $user = User::Create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password_']),
            'country_id' => $data['country'],
            'birthday' => $data['birthday']
        ]);

        //user manualy login for verify email
        Auth::login($user);
        event(new Registered($user));


        return redirect("/users");
    }
}
