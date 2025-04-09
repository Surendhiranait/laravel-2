<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\CivilInternInterface;
use App\Repositories\CivilInternRepository;
use App\Interfaces\EmployeeWriteInterface;
use App\Services\EmployeeService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    protected $policies = [
        \App\Models\CivilEmployee::class => \App\Policies\CivilEmployeePolicy::class,
    ];

    public function register()
    {
        $this->app->bind(CivilInternInterface::class, CivilInternRepository::class);

        $this->app->bind(EmployeeWriteInterface::class, EmployeeService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
