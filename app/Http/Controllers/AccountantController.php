<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountantRequest;
use DataTables;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Expense;
use App\Models\Accountant;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ExpenseRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Schema;

class AccountantController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Accountant::with('user')->get();

            return datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('accountant.show', $row->id) . '" type="button" class="btn btn-sm btn-info waves-effect waves-light me-1">' . 'show' . '</a>';
                    $td .= '<a href="' . route('accountant.edit', $row->id) . '" type="button" class="btn btn-sm btn-success waves-effect waves-light me-1">' . 'Edit Accountant' . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('accountant.destroy', $row->id) . '"  class="btn btn-sm btn-danger delete-btn">' . 'Delete Accountant' . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('user_id', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= $row->user;
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->make(true);
        }
        return view('accountant.index');
    }

    public function create()
    {
        return view('accountant.create', ['accountant' => Accountant::all(),
        'users'=> User::find(Auth::id())]);
    }


    public function store(AccountantRequest $request)
    {
        $validated = $request->validated();
        Accountant::create($validated);
        return redirect()->route('accountant.index');
    }



    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expense.index');
    }

    public function show(Request $request, $id)
    {

        $accountants = Accountant::get()->where('id', $id);
        // $imageUrl = asset($expenses->getFirstMedia('images')->getUrl());

        $now = Carbon::now();
        $otherDateObject = DB::table('accountants')->where('id', $id)->value('created_at');
        $otherDateAsString = Carbon::parse($otherDateObject)->format('Y-m-d');
        $daysDifference = $now->diffForHumans($otherDateAsString);
        return view('accountant.show', compact('accountants',  'daysDifference', 'id'));
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


    public function edit(Accountant $accountant)
    {

        $users =user::get();
        return view('accountant.edit', compact('accountant','users'));
    }

    public function update(AccountantRequest $request, Accountant $accountant)
    {

        $validated = $request->validated();
        $accountant->update($validated);

        return redirect()->route('accountant.index');
    }


}
