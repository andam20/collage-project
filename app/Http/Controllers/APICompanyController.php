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
        $data=Expense::all();

        return response()->json($data);
    }

    public function last_four(Request $request)
    {
        $data=Expense::latest('date')->take(4)->get();

        return response()->json($data);
    }

    public function count(Request $request)
    {
        return CompanyProfile::all()->count();
    }


    // public function managers($id)
    // {

    //     $employee = Employee::findOrFail($id);

    //     $managerLine = $employee->managerLine;
    //     $manager = $managerLine->manager;
    //     $founder = $manager->founder;
    //     $employees = $managerLine->employees;

    //     $data = [
    //         'managerLine' => [
    //             'id' => $managerLine->id,
    //             'name' => $managerLine->name
    //         ],
    //         'manager' => [
    //             'id' => $manager->id,
    //             'name' => $manager->name
    //         ],
    //         'founder' => [
    //             'id' => $founder->id,
    //             'name' => $founder->name
    //         ],
    //         'employees' => $employees->pluck('name')
    //     ];

    //     return response()->json($data);
    // }


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
        $total = Expense::where('company_profile_id', $id)->get();
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
