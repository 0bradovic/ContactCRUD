<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Repositories\Contact\ContactRepository;
use App\Repositories\Contact\EloquentContact;
use App\Repositories\Group\GroupRepository;
use App\Repositories\Group\EloquentGroup;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton(ContactRepository::class, EloquentContact::class);
        $this->app->singleton(GroupRepository::class, EloquentGroup::class);
    }
}
