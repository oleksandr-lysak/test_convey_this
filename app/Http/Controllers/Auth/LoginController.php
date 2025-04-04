<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;

class LoginController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        if ($this->authService->login($request->only('email', 'password'))) {
            return redirect()->route('dashboard');
        }

        return redirect()->back()->withErrors(['email' => 'Wrong email or password.'])->withInput();
    }

    public function logout()
    {
        $this->authService->logout();
        return redirect()->route('login');
    }
}
