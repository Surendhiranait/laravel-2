<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\CivilInternInterface;
use App\Repositories\CivilInternRepository;
use App\Interfaces\EmployeeWriteInterface;
use App\Services\EmployeeService;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Interfaces\PostRepositoryInterface;
use App\Repositories\PostRepository;
use App\Interfaces\CountryRepositoryInterface;
use App\Repositories\CountryRepository;
use App\Interfaces\MailRepositoryInterface;
use App\Repositories\MailRepository;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{

    protected $policies = [
        \App\Models\CivilEmployee::class => \App\Policies\CivilEmployeePolicy::class,
    ];

    public function register()
    {
        $this->app->bind(CivilInternInterface::class, CivilInternRepository::class);

        $this->app->bind(EmployeeWriteInterface::class, EmployeeService::class);

        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);

        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);

        $this->app->bind(MailRepositoryInterface::class, MailRepository::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
