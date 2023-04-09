<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\WorkType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\CompanyProfileExport;
use App\Http\Requests\WorktypeRequest;
use Illuminate\Support\Facades\Schema;
use App\Http\Requests\CompanyProfileRequest;
use App\Http\Requests\ExpenseRequest;
use App\Models\CompanyProfile;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Expense::get();

            return datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('expense.edit', $row->id) . '" type="button" class="btn btn-sm btn-success waves-effect waves-light me-1">' . 'edit Work Type' . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('expense.destroy', $row->id) . '"  class="btn btn-sm btn-danger delete-btn">' . 'delete Work Type' . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->make(true);
        }
        return view('expense.index');
    }

    public function create()
    {
        // dd(CompanyProfile::get('name'));
        return view('expense.create', ['expense' => Expense::all(),"employee" => CompanyProfile::select('id', 'name')->get()]);
    }


    public function store(ExpenseRequest $request)
    {
        $validated = $request->validated();
        Expense::create($validated);
        return redirect()->route('expense.index');
    }



    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expense.index');
    }


    public function exportIntoExcel()
    {
        //check permission
        // $this->authorize("booking_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "expenses";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = Expense::query();

        // create file name  
        $fileName = "expenses_" . date('Y-m-d_h:i_a') . ".xlsx";

        return (new ExpenseRequest($query, $headers))->download($fileName);
    }


    public function edit(Expense $expense)
    {
        return view('expense.edit', compact('expense'));
    }

    public function update(ExpenseRequest $request, Expense $expense)
    {

        $validated = $request->validated();
        $expense->update($validated);

        return redirect()->route('expense.index');
    }
}