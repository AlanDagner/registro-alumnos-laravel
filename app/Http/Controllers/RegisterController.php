<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        if (auth()->user()) {
            return view('auth.register');
        } else {
            return redirect()->to('/');
        }
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);


        $user = User::create(request(['name', 'email', 'password']));
        return redirect()->to('/')->with('success', 'Se ha registrado un Nuevo usuario.');
    }
}
