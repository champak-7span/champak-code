<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Support\Facades\Blade;

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
    public function boot(Gate $gate,Blade $balde)
    {
        Paginator::useBootstrap();
        
        $gate->define('admin', function(User $user){
            
            return $user->userName == 'admin';
        });


        // blade file in create 
        Blade::if('admin', function(){
            return request()->user()->can('admin');
        });
    }
}
