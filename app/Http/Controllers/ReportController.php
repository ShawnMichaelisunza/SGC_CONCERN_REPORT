<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Services\ReportService;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected $reportService;

    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }

    // view all data
    public function pending()
    {
        $reports = $this->reportService->ReportAllPendingService();
        return view('admin_dashboard', ['reports' => $reports]);
    }
    public function processed()
    {
        $reports = $this->reportService->ReportAllProcessService();
        return view('admin_dashboard', ['reports' => $reports]);
    }
    public function completed()
    {
        $reports = $this->reportService->ReportAllCompletedService();
        return view('admin_dashboard', ['reports' => $reports]);
    }
    public function disapproved()
    {
        $reports = $this->reportService->ReportAllDeleteService();
        return view('admin_dashboard', ['reports' => $reports]);
    }

    // create a data
    public function create()
    {
        return view('request.request_create');
    }
    public function store(ReportRequest $req)
    {
        $val = $req->validated();

        $this->reportService->ReportStoreService($val);
        return redirect()->route('dashboard')->with('success', 'Created Report Successfully !');
    }

    // view a data
    public function view($id)
    {
        $report = $this->reportService->ReportViewService($id);

        $data = [
            'report' => $report
        ];

        $pdf = FacadePdf::loadView('request.request_view', $data);
        return $pdf->stream('request.pdf');
    }

    // edit and udpate a data
    public function edit($id)
    {
        $report = $this->reportService->ReportEditService($id);

        return view('request.request_edit', ['report' => $report]);
    }
    public function update($id, ReportRequest $req)
    {
        $val = $req->validated();

        $this->reportService->ReportUpdateService($id, $val);
        return redirect()->route('dashboard')->with('success', 'Updated Report Successfully !');
    }

    // view and aprrove a data
    public function approveView($id)
    {
        $report = $this->reportService->ReportViewApproveService($id);
        return view('request.request_approve', ['report' => $report]);
    }

    // view and approve request a data
    public function viewProcess($id)
    {
        $report = $this->reportService->ReportViewProcessService($id);
        return view('request.request_process', ['report' => $report]);
    }
    public function process($id)
    {
        $report = $this->reportService->ReportProcessService($id);
        $report->ticket_no = 'TKT'. now()->format('Y'). ' - '. str_pad($report->id, 5, '0', STR_PAD_LEFT);
        $report->save();

        return redirect()->route('dashboard')->with('success', 'Deleted Request Successfully !');
    }

    // view and delete a data
    public function viewDelete($id)
    {
        $report = $this->reportService->ReportViewDeleteService($id);
        return view('request.request_delete', ['report' => $report]);
    }
    public function destroy($id)
    {
        $this->reportService->ReportDestroyService($id);
        return redirect()->route('dashboard')->with('success', 'Deleted Request Successfully !');
    }
}
