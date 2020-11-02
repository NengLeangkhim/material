<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/bsc/purchase.php'));

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/bsc/invoice.php'));

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/bsc/chart_account.php'));

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/bsc/customer_management.php'));

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/bsc/report_balancesheet.php'));

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/bsc/report_income_statement.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/api.php'));


        /**
         * Multiple API Configuration
         */

        // 1. --- CRM API ---
        Route::prefix('api')
        ->middleware('api')
        ->namespace($this->namespace)
        ->group(base_path('routes/api/crm_api/organize.php'));

        Route::prefix('api')
        ->middleware('api')
        ->namespace($this->namespace)
        ->group(base_path('routes/api/crm_api/quote.php'));


        Route::prefix('api')
        ->middleware('api')
        ->namespace($this->namespace)
        ->group(base_path('routes/api/crm_api/contact.php'));

        Route::prefix('api')
        ->middleware('api')
        ->namespace($this->namespace)
        ->group(base_path('routes/api/crm_api/lead.php'));

        Route::prefix('api')
        ->middleware('api')
        ->namespace($this->namespace)
        ->group(base_path('routes/api/crm_api/report.php'));

        Route::prefix('api')
        ->middleware('api')
        ->namespace($this->namespace)
        ->group(base_path('routes/api/crm_api/crm_setting.php'));

        // 2. --- STOCK API ---
        Route::prefix('api')
        ->middleware('api')
        ->namespace($this->namespace)
        ->group(base_path('routes/api/stock_api/stock.php'));


         // 3. --- BSC API ---
         Route::prefix('api')
         ->middleware('api')
         ->namespace($this->namespace)
         ->group(base_path('routes/api/bsc_api/report_balancesheet.php'));

         Route::prefix('api')
         ->middleware('api')
         ->namespace($this->namespace)
         ->group(base_path('routes/api/bsc_api/report_income_statement.php'));

         Route::prefix('api')
         ->middleware('api')
         ->namespace($this->namespace)
         ->group(base_path('routes/api/bsc_api/invoice.php'));

         Route::prefix('api')
         ->middleware('api')
         ->namespace($this->namespace)
         ->group(base_path('routes/api/bsc_api/purchase.php'));

         Route::prefix('api')
         ->middleware('api')
         ->namespace($this->namespace)
         ->group(base_path('routes/api/bsc_api/customer_management.php'));

         Route::prefix('api')
         ->middleware('api')
         ->namespace($this->namespace)
         ->group(base_path('routes/api/bsc_api/chart_account.php'));
    }


}
