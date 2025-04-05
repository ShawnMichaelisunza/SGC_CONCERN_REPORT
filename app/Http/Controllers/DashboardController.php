<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ReportService;
use App\Services\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    protected $reportService;
    protected $employeeService;

    public function __construct(ReportService $reportService, EmployeeService $employeeService)
    {
        $this->reportService = $reportService;
        $this->employeeService = $employeeService;
    }

    public function index()
    {
        $reports = $this->reportService->AllReportService();

        if (Auth::id()) {
            $usertype = auth()->user()->usertype;

            if ($usertype == 'admin' || $usertype == 'headAdmin' || $usertype == 'superAdmin') {
                return view('admin_dashboard', ['reports' => $reports]);

            }elseif($usertype == 'user'){

                $employees = $this->employeeService->AllEmployeeService();

                return view('dashboard', ['employees' => $employees]);
            }
        }
        return abort(404);
    }
}
