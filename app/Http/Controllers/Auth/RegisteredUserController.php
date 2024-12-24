<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{

    public function create(): View
    {
        return view('auth.register');
    }


    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'unique:users'],
                'password' => ['required', 'confirmed', 'min:8'],
                'country' => ['required', 'string'],
                'country_code' => ['required', 'string'],
                'phone' => ['required', 'string', 'unique:users'],
                'agreement' => ['required', 'accepted']
            ]);

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'country' => $validated['country'],
                'country_code' => $validated['country_code'],
                'phone' => $validated['phone'],
                'role' => 'user',
                'agreement' => true
            ]);

            Auth::login($user);
            DB::commit();
         
            
            return redirect()->route('dashboard');
            
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}