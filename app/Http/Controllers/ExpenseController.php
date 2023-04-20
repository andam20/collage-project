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
use Carbon\Carbon;

class ExpenseController extends Controller
{
    public function index(Request $request)
    {

        $amount = Expense::get()->sum('amount');
        $amountCount = Expense::get()->count('amount');
        $income = Expense::get()->sum('income');
        $incomeCount = Expense::get()->count('income');
        $incomeCount = Expense::get()->count('income');
        $reject = Expense::get()->where('status', 'Rejected')->count('status');
        $accept = Expense::get()->where('status', 'Accepted')->count('status');
        $pending = Expense::get()->where('status', 'Pending')->count('status');
        $not_paid_back = Expense::get()->where('status', 'Not Paid Back')->count('paid_back');
        $paid_back = Expense::get()->where('paid_back', 'Paid Back')->count('paid_back');

        $topCompanyProfiles = DB::table('company_profiles')
            ->select('company_profiles.first_name', DB::raw('SUM(expenses.amount) as total_expenses'))
            ->join('expenses', 'company_profiles.id', '=', 'expenses.company_profile_id')
            ->groupBy('company_profiles.id', 'company_profiles.first_name')
            ->orderByDesc('total_expenses')
            ->limit(3)
            ->get();

        if ($request->ajax()) {
            $data = Expense::with('company_profile')->get();

            return datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<div class="me-1">';
                    $td .= '<a href="' . route('expense.show', $row->id) . '" type="button" class="btn btn-sm btn-info waves-effect waves-light">' . 'show' . '</a>';
                    $td .= '</div>';
                    $td .= '<div class="me-1">';
                    $td .= '<a href="' . route('expense.edit', $row->id) . '" type="button" class="btn btn-sm btn-success waves-effect waves-light">' . 'edit' . '</a>';
                    $td .= '</div>';
                    $td .= '<div>';
                    $td .= '<form action="' . route('expense.destroy', $row->id) . '" method="POST">';
                    $td .= csrf_field();
                    $td .= method_field('DELETE');
                    $td .= '<button type="submit" class="btn btn-sm btn-danger waves-effect waves-light">' . 'delete' . '</button>';
                    $td .= '</form>';
                    $td .= '</div>';
                    $td .= '</div>';
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('company_profile_id', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= $row->company_profile;
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->make(true);
        }
        return view(
            'expense.index',
            compact(
                'amount',
                'amountCount',
                'income',
                'incomeCount',
                'reject',
                'accept',
                'pending',
                'not_paid_back',
                'paid_back',
                'topCompanyProfiles'
            )
        );
    }

    public function create()
    {
        return view('expense.create', ['expense' => Expense::all(), "data" => CompanyProfile::get()]);
    }


    public function store(ExpenseRequest $request)
    {
        $validated = $request->validated();
        $expense = Expense::create($validated);

        if ($request->hasFile('image')) {
            $expense->addMediaFromRequest('image')
                ->toMediaCollection('images');
        }
        return redirect()->route('expense.index');
    }



    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expense.index');
    }

    public function show(Request $request, $id)
    {

        $expenses = Expense::with('media')->findOrFail($id);
        $imageUrl = asset($expenses->getFirstMediaUrl('images'));

        $now = Carbon::now();
        $otherDateObject = DB::table('expenses')->where('id', $id)->value('created_at');
        $otherDateAsString = Carbon::parse($otherDateObject)->format('Y-m-d');
        $daysDifference = $now->diffForHumans($otherDateAsString);
        return view('expense.show', compact('expenses', 'daysDifference', 'id', 'imageUrl'));
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

        $company = CompanyProfile::all();
        return view('expense.edit', compact('expense', 'company'));
    }

    public function update(ExpenseRequest $request, Expense $expense)
    {

        $validated = $request->validated();
        unset($validated['image']);
        $expense->update($validated);

        if ($request->has('image')) {
            $expense->media()->delete();
            // addMediaFromRequest expects the name of the file in the view
            $expense->addMediaFromRequest('image')
                ->toMediaCollection('image');
        }


        return redirect()->route('expense.index');
    }
}