<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class LicenseController extends Controller
{
    /**
     * Display the license agreement view.
     */
    public function index(): View
    {
        return view('license'); // Ensure you have a license.blade.php view file
    }
} 