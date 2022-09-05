<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Show sign-up form
    public function create(){
        return view("users/signup");
    }

    //Show login form
    public function login(){
        return view("users/login");
    }

    //Saves and logs new user in
    public function store(Request $request){
        $validFields = $request->validate([
            "name" => ["required", "min:3"],
            "email" => ["required", "email", Rule::unique("users", "email")],
            "password" => ["required", "confirmed", "min:6"]
        ]);

        $validFields["password"] = bcrypt($validFields["password"]);

        $user = User::create($validFields);

        auth()->login($user);

        return redirect('/')->with("user", "Registered Successfully");

    }

    //Logs user in
    public function authenticate(Request $request){
        $validFields = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required", "min:6"]
        ]);

        if(auth()->attempt($validFields)){
            $request->session()->regenerate();

            return redirect('/')->with("user", "Logged in Successfully");
        };

        return back()->withErrors(["login" => "Invalid credentials"])->onlyInput("login");

    }

    //logs user out
    public function logout(Request $request){

        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with("user", "Logged Out Successfully");
    }
}
