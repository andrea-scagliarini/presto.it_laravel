<?php

namespace App\Providers;

use App\Models\Category;
use Nette\Utils\Paginator;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View as FacadesView;


class AppServiceProvider extends ServiceProvider
{
    /**
    * Register any application services.
    */
    public function register(): void
    {
        //
    }
    
    /**
    * Bootstrap any application services.
    */
    public function boot(): void
    {
        if(Schema::hasTable('categories')){
            
            FacadesView::share('categories', Category::all());
        }

      
    }
}
