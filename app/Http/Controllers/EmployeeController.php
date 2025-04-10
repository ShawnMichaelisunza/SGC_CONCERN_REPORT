<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Models\Maintenance;
use App\Services\EmployeeService;
use App\Services\MaintenanceService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employeeService;
    protected $maintenanceService;

    public function __construct(EmployeeService $employeeService, MaintenanceService $maintenanceService)
    {
        $this->maintenanceService = $maintenanceService;
        $this->employeeService = $employeeService;
    }

    // view all data
    public function pending()
    {
        $employees = $this->employeeService->EmployeeAllPendingService();
        return view('dashboard', ['employees' => $employees]);
    }
    public function processed()
    {
        $employees = $this->employeeService->EmployeeAllProcessService();
        return view('dashboard', ['employees' => $employees]);
    }
    public function completed()
    {
        $employees = $this->employeeService->EmployeeAllCompletedService();
        return view('dashboard', ['employees' => $employees]);
    }
    public function disapproved()
    {
        $employees = $this->employeeService->EmployeeAllDeleteService();
        return view('dashboard', ['employees' => $employees]);
    }

    // create and store a data
    public function create()
    {
        return view('employee_request.employee_request_create');
    }
    public function store(ReportRequest $req)
    {
        $val = $req->validated();

        $this->employeeService->EmployeeStoreService($val);
        return redirect()->route('dashboard')->with('success', 'Created Report Successfully !');
    }

    // view a data
    public function view($id)
    {
        $report = $this->employeeService->EmployeeViewService($id);

        $data = [
            'report' => $report
        ];

        $pdf =  Pdf::loadView('employee_request.employee_request_view', $data);
        return $pdf->stream('employee_request.pdf');
    }

    // edit and udpate a data
    public function edit($id)
    {
        $report = $this->employeeService->EmployeeEditService($id);

        return view('employee_request.employee_request_edit', ['report' => $report]);
    }
    public function update($id, ReportRequest $req)
    {
        $val = $req->validated();

        $this->employeeService->EmployeeUpdateService($id, $val);
        return redirect()->route('dashboard')->with('success', 'Updated Report Successfully !');
    }

    // view and delete a data
    public function viewDelete($id)
    {
        $report = $this->employeeService->EmployeeViewDeleteService($id);
        return view('employee_request.employee_request_delete', ['report' => $report]);
    }
    public function destroy($id)
    {
        $this->employeeService->EmployeeDestroyService($id);
        return redirect()->route('dashboard')->with('success', 'Deleted Request Successfully !');
    }

    // view completed request

    public function viewPDF($id)
    {
        $report = $this->maintenanceService->MaintenancneViewService($id);

        $maintenances = Maintenance::where('report_id', $report->id)->get();

        $data = [
            'report' => $report,
            'maintenances' => $maintenances,
        ];

        $pdf = Pdf::loadView('maintenance.maintenance_view', $data);

        return $pdf->stream('sample.pdf');
    }
}
