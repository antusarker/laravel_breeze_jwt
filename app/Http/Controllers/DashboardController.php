<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\DashboardService;

class DashboardController extends Controller
{
    protected DashboardService $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index()
    {
        $metrics = $this->dashboardService->getDashboardMetrics();
        return view('dashboard', $metrics);
    }
}