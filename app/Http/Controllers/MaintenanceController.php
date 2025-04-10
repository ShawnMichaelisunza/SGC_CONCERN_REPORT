<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MaintenanceRequest;
use App\Models\Maintenance;
use App\Services\MaintenanceService;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller
{
    protected $maintenanceService;

    public function __construct(MaintenanceService $maintenanceService)
    {
        $this->maintenanceService = $maintenanceService;
    }

    public function store($id, MaintenanceRequest $req)
    {
        $this->maintenanceService->MaintenanceStoreService($id);

        $val = $req->validated();

        if ($req->has('img_before')) {
            $img_b = $req->file('img_before');
            $extension = $img_b->getClientOriginalExtension();
            $pathB = 'uploads/before_image/';
            $imgBName = time(). '.' . $extension;
            $img_b->move($pathB , $imgBName);
        }

        if ($req->has('img_after')) {
            $img_f = $req->file('img_after');
            $extension = $img_f->getClientOriginalExtension();
            $pathF = 'uploads/after_image/';
            $imgFName = time(). '.' . $extension;
            $img_f->move($pathF , $imgFName);
        }

        $val['date_start'] = Carbon::parse($val['date_start'])->format('M d, Y');
        $val['date_end'] = Carbon::parse($val['date_end'])->format('M d, Y');

        $val['img_before'] = $pathB.$imgBName;

        $val['img_after'] = $pathF.$imgFName;

        Maintenance::create($val);

        return redirect()->route('dashboard')->with('success', 'Approved Request Successfully !');
    }

    public function view($id)
    {
        $report = $this->maintenanceService->MaintenancneViewService($id);

        $maintenances = Maintenance::where('report_id', $report->id)->get();


        $data = [
            'report' => $report,
            'maintenances' => $maintenances,
        ];

        $pdf = Pdf::loadView('maintenance.maintenance_view', $data);

        return $pdf->stream('maintenance.pdf');

    }
}
