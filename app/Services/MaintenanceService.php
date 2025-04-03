<?php


namespace App\Services;

use App\Models\Maintenance;
use App\Models\Report;

class MaintenanceService{

    public function MaintenanceStoreService($id){

        $decrypt = decrypt($id);
        $report = Report::findOrFail($decrypt);
        $report->status = "COMPLETED";

        $report->save();

        return $report;

    }

    public function MaintenancneViewService($id){

        $decrypt = decrypt($id);
        $report = Report::findOrFail($decrypt);

        return $report;
    }

}
