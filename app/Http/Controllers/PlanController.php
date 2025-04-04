<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();

        return view('plans', compact('plans'));
    }

    public function change(Request $request)
    {
        $request->validate(['plan_id' => 'required|exists:plans,id']);

        auth()->user()->update(['plan_id' => $request->plan_id]);

        return redirect()->back()->with('success', 'Plan updated');
    }
}
