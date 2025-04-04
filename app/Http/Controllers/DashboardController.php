<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveDomainRequest;
use App\Services\DashboardService;
use App\Services\DomainService;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(DashboardService $dashboardService)
    {
        $data = $dashboardService->getDashboardData();
        return view('dashboard', $data);
    }

    public function saveDomain(SaveDomainRequest $request, DomainService $domainService)
    {
        $domainService->processAndSaveDomain($request->domain);

        return redirect()->route('dashboard')->with('success', 'Domain saved successfully!');
    }
}
