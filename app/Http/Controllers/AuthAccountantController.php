<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Accountant;
use App\Models\Company;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AuthAccountantController extends Controller
{


    
    public function index(Request $request)
    {

        $accountantId = $request->session()->get('accountant_id');
        $accountant = Accountant::find($accountantId)->all();

        return view('auth-accountant.profile', compact('accountant'));
    }

    public function employee(Request $request)
    {

        $accountantId = $request->session()->get('accountant_id');
        $accountant = Accountant::with('user')->find($accountantId)->all();

     

        return view('auth-accountant.employee', compact('accountant'));
    }



    public function logout(Request $request)
    {
        $request->session()->forget('accountant_id');
        $request->session()->flush();
        return view('auth-accountant.login');
    }

    // Show Login Form
    public function login()
    {
        return view('auth-accountant.login');
    }

    // Authenticate User
    public function authenticate(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $accountant = Accountant::attempt($email, $password);

        if ($accountant) {
            $request->session()->put('accountant_id', $accountant->id);
            $id=$accountant->id;
            $accountant=Accountant::with('user')->where('id',$id)->get();
            return view('auth-accountant.index',compact('accountant'));
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.'
            ]);
        }

    }

}