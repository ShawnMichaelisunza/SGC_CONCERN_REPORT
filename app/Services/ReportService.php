<?php

namespace App\Services;

use App\Models\Report;

class ReportService
{
    // view all data

    public function AllReportService()
    {
        $reports = Report::where('company_name', auth()->user()->company_name)
            ->where('dept', auth()->user()->dept)
            ->orderBy('created_at', 'DESC');

        if (request()->has('search_name')) {
            $reports = $reports->where('name', 'like', '%' . request()->get('search_name', '') . '%');
        }

        return $reports->paginate(9);
    }
    public function ReportAllPendingService()
    {
        $reports = Report::where('status', 'PENDING')
            ->where('company_name', auth()->user()->company_name)
            ->where('dept', auth()->user()->dept)
            ->orderBy('created_at', 'DESC');

        if (request()->has('search_name')) {
            $reports = $reports->where('name', 'like', '%' . request()->get('search_name', '') . '%');
        }

        return $reports->paginate(9);
    }
    public function ReportAllProcessService(){
        $reports = Report::where('status', 'PROCESSING')
            ->where('company_name', auth()->user()->company_name)
            ->where('dept', auth()->user()->dept)
            ->orderBy('created_at', 'DESC');

        if (request()->has('search_name')) {
            $reports = $reports->where('name', 'like', '%' . request()->get('search_name', '') . '%');
        }

        return $reports->paginate(9);
    }
    public function ReportAllCompletedService(){
        $reports = Report::where('status', 'COMPLETED')
            ->where('company_name', auth()->user()->company_name)
            ->where('dept', auth()->user()->dept)
            ->orderBy('created_at', 'DESC');

        if (request()->has('search_name')) {
            $reports = $reports->where('name', 'like', '%' . request()->get('search_name', '') . '%');
        }

        return $reports->paginate(9);
    }
    public function ReportAllDeleteService(){
        $reports = Report::onlyTrashed()
            ->where('company_name', auth()->user()->company_name)
            ->where('dept', auth()->user()->dept)
            ->orderBy('created_at', 'DESC');

        if (request()->has('search_name')) {
            $reports = $reports->where('name', 'like', '%' . request()->get('search_name', '') . '%');
        }

        return $reports->paginate(9);
    }


    // create a data
    public function ReportStoreService($data){
        $report = Report::create($data);

        return $report;
    }

    // view a data
    public function ReportViewService($id)
    {
        $decrypt = decrypt($id);
        $report = Report::findOrFail($decrypt);

        return $report;
    }

    // edit and update a data
    public function ReportEditService($id)
    {
        $decrypt = decrypt($id);
        $report = Report::findOrFail($decrypt);

        return $report;
    }
    public function ReportUpdateService($id, $data)
    {
        $decrypt = decrypt($id);
        $report = Report::findOrFail($decrypt);

        return $report->update($data);
    }

    // view a approve data
    public function ReportViewApproveService($id)
    {
        $decrypt = decrypt($id);
        $report = Report::findOrFail($decrypt);

        return $report;
    }

    // view and process a data
    public function ReportViewProcessService($id)
    {
        $decrypt = decrypt($id);
        $report = Report::findOrFail($decrypt);

        return $report;
    }
    public function ReportProcessService($id)
    {
        $decrypt = decrypt($id);
        $report = Report::findOrFail($decrypt);
        $report->status = 'PROCESSING';
        $report->save();

        return $report;
    }

    // view and delete a data
    public function ReportViewDeleteService($id)
    {
        $decrypt = decrypt($id);
        $report = Report::findOrFail($decrypt);

        return $report;
    }
    public function ReportDestroyService($id)
    {
        $decrypt = decrypt($id);
        $report = Report::findOrFail($decrypt);
        $report->status = 'DISAPPROVED';
        $report->delete();
        $report->save();

        return $report;
    }
}
