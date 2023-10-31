<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        //Enable Bootstrap Pagination on Go Tanzania Adventure
        Paginator::useBootstrap();

        //Directive for formatting currency
        Blade::directive('money',function($money){

            return "<?php echo 'Tsh &nbsp;'.number_format($money, 2); ?>";
        });

        //Directive for Package description to show 250 words
        Blade::directive('description',function($description){

            return "<?php echo substr($description,0,250); ?>";
        });
    }
}
