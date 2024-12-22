<?php

namespace App\Providers;

use App\Models\GeneralInfo;
use App\Models\Phone;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;

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
        $phones = Phone::all();

        $info = GeneralInfo::first();

        View::composer('partials.sidebar', function ($view) use ($phones, $info) {
            $view->with('phones', $phones);
            $view->with('info', $info);
        });

        View::composer('partials.banner', function ($view) use ($phones, $info) {
            $view->with('phones', $phones);
            $view->with('info', $info);
        });

        View::composer('partials.footer', function ($view) use ($phones, $info) {
            $view->with('phones', $phones);
            $view->with('info', $info);
        });

        View::composer('show-course', function ($view) use ($phones, $info) {
            $view->with('phones', $phones);
            $view->with('info', $info);
        });
    }
}
