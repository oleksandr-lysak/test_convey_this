<?php

namespace App\Services;

use App\Models\User;

class PlanService
{
    public function changeUserPlan(User $user, int $planId): void
    {
        $user->update(['plan_id' => $planId]);
    }
}
