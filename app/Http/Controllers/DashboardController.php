<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveDomainRequest;
use App\Services\DomainService;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', ['domain'=>Auth::user()->domain, 'plan' => Auth::user()->plan]);
    }

    public function saveDomain(SaveDomainRequest $request, DomainService $domainService)
    {
        $domainService->processAndSaveDomain($request->domain);

        return redirect()->route('dashboard')->with('success', 'Domain saved successfully!');
    }
}
