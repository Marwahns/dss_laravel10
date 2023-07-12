<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'VIKOR | Login'; // Judul halaman
        return view('user.login', compact('data'));
    }
}
