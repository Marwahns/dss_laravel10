<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'VIKOR | Login'; // Judul halaman
        return view('user.login', compact('data'));
    }

    public function check(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
        } else {
            return redirect()->route('home.index')->with('success', 'Signed in successfully');
            return redirect()->route('login.index')->with('failed', 'Incorrect Email or Password');
        }
    }
}