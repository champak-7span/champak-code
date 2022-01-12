<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Gate;
use Blade;

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
        
        Gate::define('admin', function(User $user){
            
            return $user->userName == 'admin';
        });


        // blade file in create 
        Blade::if('admin', function(){
            return request()->user()->can('admin');
        });
    }
}
