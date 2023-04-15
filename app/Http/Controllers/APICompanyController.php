<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyProfileRequest;
use App\Models\User;
use App\Models\Company;
use App\Models\Expense;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CompanyRequest;

class APICompanyController extends Controller
{


    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response(['message' => 'You have been successfully logged out']);
    }

    public function total()
    {
        $employee_profile = auth()->user();
        $total = $employee_profile->expense()->select('amount')->sum('amount');
        // $employee_profile->expense->get();
        return response()->json([
            'expense' => $total
        ]);
    }

    public function income()
    {
        $employee_profile = auth()->user();
        $expenses = $employee_profile->expense()->select('income')->sum('income');
        $money_returned= $employee_profile->expense()->select('money_returned')->sum('money_returned');
        $total=$expenses+$money_returned;
        // $employee_profile->expense->get();
        return response()->json([
            'expense' => $total
        ]);
    }

    public function last_four()
    {
        $employee_profile = auth()->user();
        return response()->json([
            'expense' => $employee_profile->expense->take(4)
        ]);
    }

    public function expense()
    {
        $employee_profile = auth()->user();
        return response()->json([
            'expense' => $employee_profile->expense
        ]);
    }

    public function employeeProfile()
    {
        $employee_profile = auth()->user();
        return response()->json([
            'employee_profile' => $employee_profile
        ]);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        $company_profile = CompanyProfile::with('expense')->where('email', $fields['email'])->first();
        $company_profile_password = CompanyProfile::where('password', $fields['password'])->first();
        if (!$company_profile || !$company_profile_password) {
            return response([
                'message' => 'bad creds'
            ], 401);
        }

        $token = $company_profile->createToken('myapptoken')->plainTextToken;
        $response = [
            'company_profile' => $company_profile,
            'token' => $token
        ];
        return response($response, 201);
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



    /**
     * Update the specified resource in storage.
     */
    public function updateEmployee(Request $request, $id)
{
    // Validate the request data
    $data = $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'salary' => 'required|numeric',
        'gender' => 'required|string|in:male,female',
        'start_date' => 'required|date_format:Y-m-d',
        'phone_no' => 'required|string',
        'email' => 'required|email',
        'address' => 'required|string',
        'password' => 'required|string'
    ]);

    // Find the employee with the given ID for the authenticated user
    $employee = auth()->user();

    // Update the employee with the new data
    $employee->update([
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'salary' => $data['salary'],
        'gender' => $data['gender'],
        'start_date' => $data['start_date'],
        'phone_no' => $data['phone_no'],
        'email' => $data['email'],
        'address' => $data['address'],
        'password' => Hash::make($data['password'])
    ]);

    return response()->json([
        'message' => 'Employee updated successfully',
        'data' => $employee // Return the updated employee data
    ]);
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return CompanyProfile::destroy($id);
    }

}