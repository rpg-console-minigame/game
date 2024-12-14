<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Personaje;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);
        if($request->password != $request->password_confirmation)
        {
            // Route::get('/register', function () {return view('register');})->name('register');
            return redirect()->route('register');
        }
        else {
            $user = new User();
            $user->name = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            // session start
            $request->session()->put('user', $user);
            return redirect()->route('welcome')->with('success', 'User created successfully');
        }
    }
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('email', '=', $request->name)->first();
        if(!$user)$user = User::where('name', '=', $request->name)->first();
        if($user && Hash::check($request->password, $user->password))
        {
            $request->session()->put('user', $user);
            return redirect()->route('welcome')->with('success', 'User logged in successfully');
        }
        else return redirect()->route('login')->with('error', 'Invalid credentials');
    }
    public function logout(Request $request)
    {
        $request->session()->forget('user');
        return redirect()->route('welcome')->with('success', 'User logged out successfully');
    }
    public function wellcomeWithData(){
        session_start();
        try {
            $user = session('user');
            $personajes = Personaje::where('users_ID', '=', $user->getKey())->get();
            return view('welcome', ['personajes' => $personajes]);
        } catch (\Throwable $th) {
            return view('welcome');
        }
    }
}
