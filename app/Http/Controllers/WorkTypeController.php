<?php

namespace App\Http\Controllers;

use DataTables;
use Carbon\Carbon;
use App\Models\User;
use App\Models\WorkType;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Exports\CompanyProfileExport;
use App\Http\Requests\WorktypeRequest;
use Illuminate\Support\Facades\Schema;
use App\Http\Requests\CompanyProfileRequest;

class WorkTypeController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = WorkType::where('user_id',Auth::id())->get();

            return datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<button type="button" class="btn btn-sm btn-success  waves-effect waves-light me-1" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-url="' . route('work-type.update', $row->id) . '" data-bs-name="' . $row->name . '">' . __('Edit Job Title') . '</button>';
                    // $td .= '<button type="button" class="btn btn-sm btn-info waves-effect waves-light me-1" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-url="' . route('work-type.update', $row->id).'" data-bs-name=">'.'edit' .'</button>';
                    // $td .= '<a href="' . route('work-type.edit', $row->id) . '" type="button" class="btn btn-sm btn-success waves-effect waves-light me-1">' . 'edit Work type' . '</a>';
                    // $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('work-type.destroy', $row->id) . '"  class="btn btn-sm btn-danger delete-btn">' .'delete ' . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->make(true);
        }
        return view('work-type.index',[
            'users' => User::find(Auth::id()),
        ]);
    }

    public function create()
    {
        return view('work-type.create', [
            'workType' => WorkType::all(),
             'company_profiles' => CompanyProfile::all(),
             'users' => User::find(Auth::id()),
            ]);
    }


    public function store(Request $request)
    {

        $post = new WorkType;
        $post->name = $request->input('name');
        $post->user_id = $request->input('user');
        $post->save();
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