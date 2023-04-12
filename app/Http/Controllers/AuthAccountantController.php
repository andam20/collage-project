<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Accountant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AuthAccountantController extends Controller
{
    // Show Register/Create Form
    //  public function create() {
    //     return view('auth-accountant.register');
    // }

    // Create New User
    // public function store(Request $request) {
    //     $formFields = $request->validate([
    //         'name' => ['required', 'min:3'],
    //         'email' => ['required', 'email', Rule::unique('users', 'email')],
    //         'password' => 'required|confirmed|min:6'
    //     ]);

    //     // Hash Password
    //     $formFields['password'] = bcrypt($formFields['password']);

    //     // Create User
    //     $user = Accountant::create($formFields);

    //     // Login
    //     auth()->login($user);

    //     return redirect('/')->with('message', 'User created and logged in');
    // }

    // Logout User
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You have been logged out!');
    }

    // Show Login Form
    public function login()
    {
        return view('auth-accountant.login');
    }



    // Authenticate User
    public function authenticate(Request $request)
    {

        $acc = Accountant::all();

        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        $formFields = Accountant::all();
        $company = User::with(['company_profiles','accountant'])->get();
        foreach ($formFields as $item) {
            if ($item->password == $request->password && $item->email == $request->email) {

                $formFields = Accountant::with('user')->where('id', $item->id)->get();
                
                

                return view('auth-accountant.index', compact('formFields', 'company'));
            }
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

}