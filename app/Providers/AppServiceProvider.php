<?php

namespace App\Providers;

use App\Models\Profile;
use App\Models\SocialMedia;
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
        //
        View::share('profile', Profile::first());

        View::share(
            'socialMedia',
            SocialMedia::orderBy('display_order')->get()
        );
    }
}
