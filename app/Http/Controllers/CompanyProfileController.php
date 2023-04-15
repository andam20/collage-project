<?php

namespace App\Http\Controllers;

use DateTime;
use DataTables;
use Carbon\Carbon;
use App\Models\User;
use App\Models\WorkType;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Exports\CompanyProfileExport;
use Illuminate\Support\Facades\Schema;
use App\Http\Requests\CompanyProfileRequest;
use App\Models\Expense;

class CompanyProfileController extends Controller
{
    public function index(Request $request)
    {

        $gender=CompanyProfile::select('gender')->get()->unique('gender');
        $count=CompanyProfile::count();
        $countMale=CompanyProfile::where('gender','male')->count();
        $countFemale=CompanyProfile::where('gender','female')->count();
        if ($request->ajax()) {
            $data = CompanyProfile::where('user_id',Auth::id())->get();

            $start_date = (!empty($_GET["startDate"])) ? ($_GET["startDate"]) : ('');
            $end_date = (!empty($_GET["endDate"])) ? ($_GET["endDate"]) : ('');
            if ($start_date && $end_date) {
                $start_date = date('Y-m-d', strtotime($start_date));
                $end_date = date('Y-m-d', strtotime($end_date));
                $data->whereBetween('start_date', [$start_date, $end_date]);
            }

            $find = $request->gender;
            if (!empty($find)) {
                $data->where('gender', $find);
            }

            if (!empty($request->modelName)) {
                $data->where('model', $request->modelName);
            }

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
        return view('company-profile.index',compact('count','countMale','countFemale','gender'));
    }

    public function create()
    {
        return view('company-profile.create', [
            'companyProfile' => CompanyProfile::all()
            ,'job_titles' => WorkType::all(),
            'users'=> User::find(Auth::id()),
        ]);
    }


    public function store(Request $request)
    {
        $post = new CompanyProfile;
        $post->first_name = $request->input('first_name');
        $post->last_name = $request->input('last_name');
        $post->salary = $request->input('salary');
        $post->user_id = $request->input('user');
        $post->job_title = $request->input('job_title');
        $post->start_date = $request->input('start_date');
        $post->gender = $request->input('gender');
        $post->phone_no = $request->input('phone_no','min:7');
        $post->email = $request->input('email');
        $post->address = $request->input('address');
        $post->password = $request->input('password','min:8',);
        $post->save();

        if ($request->hasFile('image')) {
            $post->addMediaFromRequest('image')
                ->toMediaCollection('images');
        }
        return redirect()->route('company-profile.index');
    }


public function show(Request $request, $id)
    {
        // $cate=WorkType::with('company_profile')->get();

        $companies = CompanyProfile::with('expense')->get()->where('id', $id);
        // dd($companies);
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
        $work_types=WorkType::all();
        return view('company-profile.edit', compact('companyProfile','work_types'));
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