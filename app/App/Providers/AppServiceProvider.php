<?php

namespace App\Providers;

use Domains\Course\Models\Course;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        View::composer('partials.menu', function ($view) {
            $view->with('courses', Course::all());
        });

        View::composer('partials.menus.classroom', function ($view) {
            if (request('course') && Route::is('classroom.*')) {
                $view->with('course', Course::whereSlug(request('course'))->first());
            }
        });
    }
}
