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


    public function deleteExpense($id)
    {
        $expense = Expense::findOrFail($id);

        if ($expense) {
            $expense->delete();
            return response()->json([
                'message' => 'expense deleted successfully'
            ]);
        } else {
            return response()->json(['message' => 'expense not found'], 404);
        }
    }


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
        $money_returned = $employee_profile->expense()->select('money_returned')->sum('money_returned');
        $total = $expenses + $money_returned;
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


    public function updateExpense($id, Request $request)
    {
        $data = $request->validate([
            'amount' => 'required',
            'category' => 'required|string',
            'date' => 'required|date_format:Y-m-d',
            'description' => 'required|string',
            'status' => 'required|string|in:Accepted,Rejected,Pending',
            'paid_back' => 'required|string|in:Paid Back,Not Paid Back',
            'income' => 'numeric',
            'money_returned' => 'numeric',
            'company_profile_id' => 'required|exists:company_profiles,id'
        ]);
        $expense = Expense::findOrFail($id);

        if ($expense) {
            $expense->category = $data['category'];
            $expense->amount = $data['amount'];
            $expense->date = $data['date'];
            $expense->description = $data['description'];
            $expense->status = $data['status'];
            $expense->paid_back = $data['paid_back'];
            $expense->income = $data['income'];
            $expense->money_returned = $data['money_returned'];
            $expense->company_profile_id = $data['company_profile_id'];
            $expense->save();

            return response()->json([
                'message' => 'expense updated successfully',
                'data' => $expense
            ]);
        } else {
            return response()->json(['message' => 'expense not found'], 404);
        }
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


    public function companyName()
    {
        // Find the employee with the given ID for the authenticated user
        $employee_id = auth()->user()->id;
        $employee=CompanyProfile::with('user')->findOrFail($employee_id);


        // Return the employee if found, or an error message if not found
        if ($employee) {
            return response()->json([
                'message' => 'Employee found',
                'name' => $employee->user->name
            ]);
        } else {
            return response()->json([
                'message' => 'Employee not found'
            ], 404);
        }
    }
   
    public function showEmployee()
    {
        // Find the employee with the given ID for the authenticated user
        $employee = auth()->user();

        // Return the employee if found, or an error message if not found
        if ($employee) {
            return response()->json([
                'message' => 'Employee found',
                'data' => $employee
            ]);
        } else {
            return response()->json([
                'message' => 'Employee not found'
            ], 404);
        }
    }

    public function showExpense($id)
    {
        // Find the employee with the given ID for the authenticated user
        $expense = Expense::findOrFail($id);

        // Return the employee if found, or an error message if not found
        if ($expense) {
            return response()->json([
                'message' => 'expense found',
                'data' => $expense
            ]);
        } else {
            return response()->json([
                'message' => 'expense not found'
            ], 404);
        }
    }



    /**
     * Update the specified resource in storage.
     */
    public function updateEmployee(Request $request)
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
        if ($employee) {
            $employee->first_name = $data['first_name'];
            $employee->last_name = $data['last_name'];
            $employee->salary = $data['salary'];
            $employee->gender = $data['gender'];
            $employee->start_date = $data['start_date'];
            $employee->phone_no = $data['phone_no'];
            $employee->email = $data['email'];
            $employee->address = $data['address'];
            $employee->password = $data['password'];
            $employee->save();
            return response()->json([
                'message' => 'expense updated successfully',
                'data' => $employee
            ]);
        }
        return response()->json([
            'message' => 'Employee not updated successfully',
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