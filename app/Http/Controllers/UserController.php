<?php

use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    public function index(UserService $userService)
    {
        $users = $userService->getUsers();
        return view('users', compact('users'));
    }
}
