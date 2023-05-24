<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Spatie\Permission\Exceptions\UnauthorizedException;
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
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);
        Blade::directive('hasnorole', function ($roles) {
            return "<?php if (! auth()->check() || auth()->user()->hasRole({$roles})) : ?>";
        });
        
        Blade::directive('endhasnorole', function () {
            return '<?php endif; ?>';
        });
    }
}
