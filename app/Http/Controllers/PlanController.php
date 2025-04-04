<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePlanRequest;
use App\Models\Plan;
use App\Services\PlanService;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();

        return view('plans', compact('plans'));
    }

    public function change(ChangePlanRequest $request, PlanService $planService)
    {
        $planService->changeUserPlan(auth()->user(), $request->plan_id);

        return redirect()->back()->with('success', 'Plan updated');
    }
}
