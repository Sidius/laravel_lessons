<?php

namespace App\Providers;

use App\Models\Rubric;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
        DB::listen(function ($query) {
//            dump($query->sql, $query->bindings);
//            dump($query->sql);
//            Log::info($query->sql);
            Log::channel('sqllogs')->info($query->sql);
        });

        // l_1_32
        view()->composer('layouts.footer', function ($view) {
            $view->with('rubrics', Rubric::all());
        });
    }
}
