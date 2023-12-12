<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view) {
            // Check if the user is logged in
            if (Auth::check()) {
                // Get the authenticated user
                $user = Auth::user();
                
                $view->with('infouser', $user);
            } else {
                // If not logged in, set 'infouser' to null or whatever value you want
                $view->with('infouser', null);
            }
        });
    }
}
