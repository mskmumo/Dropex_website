<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class TermsController extends Controller
{
    /**
     * Display the terms and conditions view.
     */
    public function index(): View
    {
        return view('terms'); // Ensure you have a terms.blade.php view file
    }
} 