<?php

namespace App\Providers;

use App\Models\GeneralInfo;
use App\Models\Phone;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('partials.sidebar', function ($view) {
            $view->with('phones', Phone::all());
            $view->with('info', GeneralInfo::first());
        });

        View::composer('partials.footer', function ($view) {
            $view->with('phones', Phone::all());
            $view->with('info', GeneralInfo::first());
        });

        View::composer('show-course', function ($view) {
            $view->with('phones', Phone::all());
            $view->with('info', GeneralInfo::first());
        });
    }
}
