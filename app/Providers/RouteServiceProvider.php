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

        //CRM
        $crm = 'routes/web/crm/';
        $this->registerRoute('','web',$crm.'report.php');

        // BSC
        $bsc = 'routes/web/bsc/';
        $this->registerRoute('','web',$bsc.'purchase.php');
        $this->registerRoute('','web',$bsc.'invoice.php');
        $this->registerRoute('','web',$bsc.'chart_account.php');
        $this->registerRoute('','web',$bsc.'customer_management.php');
        $this->registerRoute('','web',$bsc.'report_balancesheet.php');
        $this->registerRoute('','web',$bsc.'report_income_statement.php');
        $this->registerRoute('','web',$bsc.'dashboard.php');
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
        $crm = 'routes/api/crm_api/';
        $this->registerRoute('api','api',$crm.'organize.php');
        $this->registerRoute('api','api',$crm.'quote.php');
        $this->registerRoute('api','api',$crm.'contact.php');
        $this->registerRoute('api','api',$crm.'lead.php');
        $this->registerRoute('api','api',$crm.'report.php');
        $this->registerRoute('api','api',$crm.'crm_setting.php');

        // 2. --- STOCK API ---
        $stock = 'routes/api/stock_api/';
        $this->registerRoute('api','api',$stock.'stock.php');

        // 3. --- BSC API ---
        $bsc = 'routes/api/bsc_api/';
        $this->registerRoute('api','api',$bsc.'report_balancesheet.php');
        $this->registerRoute('api','api',$bsc.'report_income_statement.php');
        $this->registerRoute('api','api',$bsc.'invoice.php');
        $this->registerRoute('api','api',$bsc.'purchase.php');
        $this->registerRoute('api','api',$bsc.'customer_management.php');
        $this->registerRoute('api','api',$bsc.'chart_account.php');
        $this->registerRoute('api','api',$bsc.'dashboard.php');
    }

    protected function registerRoute($prefix, $middleware, $path){
        Route::prefix($prefix)->middleware($middleware)->namespace($this->namespace)->group(base_path($path));
    }
}
