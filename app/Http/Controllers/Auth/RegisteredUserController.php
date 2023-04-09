<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // $post = new User;
        // $post->name = $request->input('name');
        // $post->slogan = $request->input('slogan');
        // $post->start_date = $request->input('start_date');
        // $post->email = $request->input('email');
        // $post->password = $request->input('password');
        // $post->password =Rules\Password::defaults();
        ;
        
        // $post->save();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // 'role' => ['required', 'string', 'max:255'],
            'slogan' => ['required', 'string', 'max:255'],
            'start_date' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // $user = new User;

        $user = User::create([
            'name' => $request->name,
            'slogan' => $request->slogan,
            'start_date' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);
        if ($request->hasFile('image')) {
            $user->addMediaFromRequest('image')
                ->toMediaCollection('images');
        }

        return redirect(RouteServiceProvider::HOME);
        // return redirect()->route('dashboard');
    }
}