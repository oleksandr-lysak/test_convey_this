<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request, UserService $userService)
    {
        $user = $userService->createUser($request->validated());
    
        Auth::login($user);
    
        return redirect()->route('dashboard');
    }
}
