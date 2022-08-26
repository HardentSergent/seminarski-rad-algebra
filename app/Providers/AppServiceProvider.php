<?php

namespace App\Providers;
use App\Http\Controllers\NavigationController;
use App\Models\Navigation;
use View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
   
    public function register()
    {
        //
    }

    
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::composer('*', function($view)
        {
            $navigation= Navigation::all();
            $view->with('navigation', $navigation);


        });
    }
}