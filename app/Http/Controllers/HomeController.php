<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.home');
    }
}
