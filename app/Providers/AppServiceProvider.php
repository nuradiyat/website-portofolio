<?php

namespace App\Providers;

use App\Models\Profile;
use App\Models\SocialMedia;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
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
        View::share(
            'profile',
            Schema::hasTable('profiles')
                ? Profile::query()->first()
                : null
        );

        View::share(
            'socialMedia',
            Schema::hasTable('social_media')
                ? SocialMedia::query()->orderBy('display_order')->get()
                : collect()
        );

        Carbon::setLocale('id');
    }
}
