<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PrivacyPolicyController extends Controller
{
    /**
     * Display the privacy policy view.
     */
    public function index(): View
    {
        return view('privacypolicy'); // Ensure you have a privacypolicy.blade.php view file
    }
} 