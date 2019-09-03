<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\facades\Blade;
use Illuminate\Support\facades\Auth;
use App\User;

class BladeExtraServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('Role' , function ($expression){
           if (Auth::user()){
               if (Auth::user()->hasAnyRole($expression)){
                   return true;
               }
           }
           return false;
        });
    }
}
