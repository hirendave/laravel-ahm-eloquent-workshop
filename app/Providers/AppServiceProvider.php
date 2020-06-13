<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\EmployeesObserver;
use App\Employees;
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
        //
        Employees::observe(EmployeesObserver::class);
    }
}
