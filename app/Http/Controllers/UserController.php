<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Personaje;
use App\Models\Zona;
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
        if ($request->password != $request->password_confirmation) {
            // Route::get('/register', function () {return view('register');})->name('register');
            return redirect()->route('welcome');
        } else {
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
        if (!$user)
            $user = User::where('name', '=', $request->name)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            $request->session()->put('user', $user);
            return redirect()->route('welcome')->with('success', 'User logged in successfully');
        } else
            return redirect()->route('welcome')->with('error', 'Invalid credentials');
    }
    public function logout(Request $request)
    {
        $request->session()->forget('user');
        return redirect()->route('welcome')->with('success', 'User logged out successfully');
    }
    public function wellcomeWithData()
    {
        session_start();
        try {
            $user = session('user');
            $personajes = Personaje::where('users_ID', '=', $user->getKey())->get();
            foreach ($personajes as $personaje) {
                $personaje->zona = Zona::where('ID', '=', $personaje->zona_ID)->first();
            }
            $spawns = Zona::where('isSpawn', '=', 1)->get();
            return view('welcome1', ['personajes' => $personajes, 'spawns' => $spawns]);
        } catch (\Throwable $th) {
            return view('welcome');
        }
    }
    public function play(Request $request)
    {
        session_start();
        $character = Personaje::where('Id', '=', $request->personaje)->first();
        if ($character->user_id != $request->user_id)
            return redirect()->route('welcome')->with('error', 'no posees ese usuario');
        session(['character' => $character]);
        return view('react');
    }
}
