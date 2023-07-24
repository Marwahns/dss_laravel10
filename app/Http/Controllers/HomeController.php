<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\Sample;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:dashboard');
    }

    public function index()
    {
        $pageTitle = 'VIKOR | Dashboard'; // Judul halaman
        $breadcrumb = 'Dashboard'; // breadcrumb
        $alternatives = Alternative::count();
        $criterion = Criteria::count();
        $samples = Sample::count();
        return view('home.home', compact('pageTitle', 'breadcrumb', 'alternatives', 'criterion', 'samples'));
    }
}
