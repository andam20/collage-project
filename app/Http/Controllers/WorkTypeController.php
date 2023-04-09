<?php

namespace App\Http\Controllers;

use App\Exports\CompanyProfileExport;
use App\Http\Requests\CompanyProfileRequest;
use App\Http\Requests\WorktypeRequest;
use DataTables;
use App\Models\WorkType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class WorkTypeController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = WorkType::get();

            return datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('work-type.edit', $row->id) . '" type="button" class="btn btn-sm btn-success waves-effect waves-light me-1">' . 'edit Work Type' . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('work-type.destroy', $row->id) . '"  class="btn btn-sm btn-danger delete-btn">' .'delete Work Type' . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->make(true);
        }
        return view('work-type.index');
    }

    public function create()
    {
        return view('work-type.create', ['workType' => WorkType::all()]);
    }


    public function store(WorktypeRequest $request)
    {
        $validated = $request->validated();
        WorkType::create($validated);
        return redirect()->route('work-type.index');
    }



    public function destroy(WorkType $workType)
    {
        $workType->delete();
        return redirect()->route('work-type.index');
    }


    public function exportIntoExcel()
    {
        //check permission
        // $this->authorize("booking_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "work_types";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = WorkType::query();

        // create file name  
        $fileName = "work_types_" . date('Y-m-d_h:i_a') . ".xlsx";

        return (new WorktypeRequest($query, $headers))->download($fileName);
    }


    public function edit(WorkType $workType)
    {
        return view('work-type.edit', compact('workType'));
    }

    public function update(WorktypeRequest $request, WorkType $workType)
    {

        $validated = $request->validated();
        $workType->update($validated);

        return redirect()->route('work-type.index');
    }
}