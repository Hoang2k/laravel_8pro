<?php

namespace App\Providers;
use App\Models\category;
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
        view()->composer('admin.indexx',function($view){
            $category=category::all();
            $view->with('category',$category);
        });
        view()->composer('admin.product',function($view){
            $category=category::all();
            $view->with('category',$category);
        });
    }
}
