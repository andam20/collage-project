<?php

namespace App\Http\Controllers;

use App\Exports\CompanyProfileExport;
use App\Http\Requests\CompanyProfileRequest;
use App\Models\CompanyProfile;
use App\Models\User;
use App\Models\WorkType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CompanyProfileController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = CompanyProfile::get();

            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('company-profile.show', $row->id) . '" type="button" class="btn btn-sm btn-info waves-effect waves-light me-1">' . 'show' . '</a>';
                    $td .= '<a href="' . route('company-profile.edit', $row->id) . '" type="button" class="btn btn-sm btn-success waves-effect waves-light me-1">' . 'edit' . '</a>';
                    $td .= '<a href="' . route('company-profile.destroy', $row->id) . '" type="button" class="btn btn-sm btn-danger waves-effect waves-light me-1">' . 'delete' . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->addColumn('image', function (CompanyProfile $post) {
                    return $post->getFirstMedia('images')->getUrl();
                })
                ->make(true);
        }
        return view('company-profile.index');
    }

    public function create()
    {
        return view('company-profile.create', [
            'companyProfile' => CompanyProfile::all()
            // ,'workTypes' => WorkType::all()
        ]);
    }


    public function store(Request $request)
    {
        $post = new CompanyProfile;
        $post->name = $request->input('name');
        $post->start_date = $request->input('start_date');
        $post->slogan = $request->input('slogan');
        $post->phone_no = $request->input('phone_no');
        $post->email = $request->input('email');
        $post->address = $request->input('address');
        $post->password = $request->input('password');
        $post->save();

        if ($request->hasFile('image')) {
            $post->addMediaFromRequest('image')
                ->toMediaCollection('images');
        }
        return redirect()->route('company-profile.index');
    }


    public function show(Request $request, $id)
    {
        $companies = CompanyProfile::get()->where('id', $id);
        $companyProfile = CompanyProfile::find($id); // get a specific CompanyProfile model instance
        $imageUrl = asset($companyProfile->getFirstMedia('images')->getUrl());


        $now = Carbon::now();
        $otherDateObject = DB::table('company_profiles')->where('id', $id)->value('start_date');
        $otherDateAsString = Carbon::parse($otherDateObject)->format('Y-m-d');
        $daysDifference = $now->diffForHumans($otherDateAsString);
        return view('company-profile.show', compact('companies', 'imageUrl', 'daysDifference', 'id'));
    }


    public function destroy(CompanyProfile $companyProfile)
    {
        $companyProfile->delete();
        return redirect()->route('company-profile.index');
    }


    public function exportIntoExcel()
    {
        //check permission
        // $this->authorize("booking_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "company_profiles";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = CompanyProfile::query();

        // create file name  
        $fileName = "employees_" . date('Y-m-d_h:i_a') . ".xlsx";

        return (new CompanyProfileExport($query, $headers))->download($fileName);
    }


    public function edit(CompanyProfile $companyProfile)
    {
        return view('company-profile.edit', compact('companyProfile'));
    }

    public function update(CompanyProfileRequest $request, CompanyProfile $companyProfile)
    {

        $validated = $request->validated();
        unset($validated['image']);
        $companyProfile->update($validated);

        if ($request->has('image')) {
            $companyProfile->media()->delete();
            // addMediaFromRequest expects the name of the file in the view
            $companyProfile->addMediaFromRequest('image')
                ->toMediaCollection('image');
        }

        return redirect()->route('company-profile.index');
    }


    public function chartData()
    {
        $data = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'My First dataset',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255,99,132,1)',
                    'borderWidth' => 1,
                    'hoverBackgroundColor' => 'rgba(255,99,132,0.4)',
                    'hoverBorderColor' => 'rgba(255,99,132,1)',
                    'data' => [0, 0, 0, 0, 0, 0, 0],
                ]
            ]
        ];

        $workType = WorkType::get();
        $numOfUser = User::get()->count();
        $male = CompanyProfile::get()->where('gender', 'male')->count();
        $female = CompanyProfile::get()->where('gender', 'female')->count();

        return view('make-profile.chart', compact('data', 'numOfUser', 'male', 'female', 'workType'));
    }


}