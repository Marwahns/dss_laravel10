<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $pageTitle = 'VIKOR | Dashboard'; // Judul halaman
        $breadcrumb = 'Dashboard'; // breadcrumb
        $criteria = Criteria::count();
        return view('home.home', compact('pageTitle', 'breadcrumb', 'criteria'));
    }
}
