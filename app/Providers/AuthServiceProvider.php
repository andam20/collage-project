<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Accountant;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        Auth::viaRequest('accountant', function (Request $request) {
            return Accountant::where('email', $request->email)->first();
        });
    }
}
