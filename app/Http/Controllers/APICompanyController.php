<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Models\CompanyProfile;
use App\Models\Expense;
use Illuminate\Http\Request;

class APICompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Expense::select('id' ,'category', 'amount','date','description','status','paid_back')->get();

        return response()->json($data);
    }

    public function profile($id)
    {
        $data = CompanyProfile::where('id',$id)->select('id' ,'job_title', 'salary','phone_no','start_date','first_name','last_name','email','password')->get();

        return response()->json($data);
    }

    public function income($id)
    {
        $expense=Expense::where('company_profile_id',$id)->select('amount')->sum('amount');
        $money_returned=Expense::where('company_profile_id',$id)->select('money_returned')->sum('money_returned');
        $income=Expense::where('company_profile_id',$id)->select('income')->sum('income');
        $income=($expense-$money_returned)+$income;

        return response()->json($income);
    }

    public function storeExpense(Request $request)
    {
        $validatedData = $request->validate([
            "category" => ["required"],
            "amount" => ["required"],
            "date" => ["required"],
            "description" => ["required"],
            "status" => ["required"],
            "paid_back" => ["required"],
            "company_profile_id" => ["required", "exists:company_profiles,id"],
        ]);

        $expense = new Expense;
        $expense->category = $validatedData['category'];
        $expense->amount = $validatedData['amount'];
        $expense->date = $validatedData['date'];
        $expense->description = $validatedData['description'];
        $expense->status = $validatedData['status'];
        $expense->paid_back = $validatedData['paid_back'];
        $expense->company_profile_id = $validatedData['company_profile_id'];
        $expense->save();



        return response()->json([
            'message' => 'Expense created successfully',
            'data' => $expense
        ]);
    }

    public function last_four(Request $request)
    {
        $data = Expense::select('id' ,'category', 'amount','date','description','status','paid_back')->latest('date')->take(4)->get();

        return response()->json($data);
    }

    public function count(Request $request)
    {
        return CompanyProfile::all()->count();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        $request->validated();
        return CompanyProfile::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return CompanyProfile::findOrFail($id)->get();
    }

    public function total($id)
    {
        $total = Expense::where('company_profile_id', $id)->sum('amount');
        return response()->json(['total' => $total]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, $id)
    {
        $employee = CompanyProfile::findOrFail($id);
        $employee->update($request->all());
        return $employee;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return CompanyProfile::destroy($id);
    }

}