<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('login-with-otp',function (Request $request) {
            return $request->is('dashboard/*')
                ? Limit::perMinute(3)->by($request->email ?: $request->ip())
                : Limit::perMinute(1)->by($request->email ?: $request->ip());

        });
        Model::preventLazyLoading();
    }
}
