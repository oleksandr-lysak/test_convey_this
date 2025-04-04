<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class DashboardService
{
    public function getDashboardData(): array
    {
        $user = Auth::user();
        return [
            'domain' => $user->domain,
            'plan' => $user->plan,
        ];
    }
}
