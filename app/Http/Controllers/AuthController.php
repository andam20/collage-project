<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{



    // public function login(Request $request)
    // {
    //     $emailRequest = $request->input('email');
    //     $passwordRequest = $request->input('password');

    //     $email_password=CompanyProfile::select('email','password')->get();


    //     foreach ($email_password as $item){

    //     if ($emailRequest==$item->email&&$passwordRequest==$item->password){ 
    //         // Passwords match, login successful
    //         return view('dashboard-company');

    //     }
    //     else {
    //         // Passwords don't match, login failed
    //         return view('auth-company.login');}
    // }  
//    }

    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ]);
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);

        $accessToken = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $accessToken
        ];
        return response($response, 201);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        $user = User::where('email', $fields['email'])->first();
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'bad creds'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response(['message' => 'You have been successfully logged out']);
    }

}