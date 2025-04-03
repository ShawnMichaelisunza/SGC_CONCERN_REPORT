<?php

namespace App\Services;

use App\Models\Report;

class EmployeeService
{
    // view all data
    public function AllEmployeeService()
    {
        $reports = Report::where('company_name', auth()->user()->company_name)
            ->where('dept', auth()->user()->dept)
            ->orderBy('created_at', 'DESC');

        if (request()->has('search_name')) {
            $reports = $reports->where('name', 'like', '%' . request()->get('search_name', '') . '%');
        }

        return $reports->paginate(9);
    }
    public function EmployeeAllPendingService()
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
    public function EmployeeAllProcessService()
    {
        $reports = Report::where('status', 'PROCESSING')
            ->where('company_name', auth()->user()->company_name)
            ->where('dept', auth()->user()->dept)
            ->orderBy('created_at', 'DESC');

        if (request()->has('search_name')) {
            $reports = $reports->where('name', 'like', '%' . request()->get('search_name', '') . '%');
        }

        return $reports->paginate(9);
    }
    public function EmployeeAllCompletedService()
    {
        $reports = Report::where('status', 'COMPLETED')
        ->where('company_name', auth()->user()->company_name)
        ->where('dept', auth()->user()->dept)
        ->orderBy('created_at', 'DESC');

        if (request()->has('search_name')) {
            $reports = $reports->where('name', 'like', '%' . request()->get('search_name', '') . '%');
        }

        return $reports->paginate(9);
    }
    public function EmployeeAllDeleteService()
    {
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
    public function EmployeeStoreService($data)
    {
        $report = Report::create($data);

        return $report;
    }

    // view a data
    public function EmployeeViewService($id)
    {
        $decrypt = decrypt($id);
        $report = Report::findOrFail($decrypt);

        return $report;
    }

    // edit and update a data
    public function EmployeeEditService($id)
    {
        $decrypt = decrypt($id);
        $report = Report::findOrFail($decrypt);

        return $report;
    }
    public function EmployeeUpdateService($id, $data)
    {
        $decrypt = decrypt($id);
        $report = Report::findOrFail($decrypt);

        return $report->update($data);
    }

    // view and delete a data
    public function EmployeeViewDeleteService($id)
    {
        $decrypt = decrypt($id);
        $report = Report::findOrFail($decrypt);

        return $report;
    }
    public function EmployeeDestroyService($id)
    {
        $decrypt = decrypt($id);
        $report = Report::findOrFail($decrypt);
        $report->status = 'DISAPPROVED';
        $report->delete();
        $report->save();

        return $report;
    }
}
