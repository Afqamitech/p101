<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

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
        
        $this->userPages();
        $this->cmsPages();
        $this->globalValues();
        $this->store();
        $this->categories();
        $this->coupon();
        $this->redeem();
        $this->query();
        $this->orderHistory();

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
             ->group(base_path('routes/api.php'));
    }
    
    protected function cmsPages()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/cmspage.php'));
    }
    
    protected function globalValues()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/globalvalues.php'));
    }
    protected function store()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/store.php'));
    }
    
    protected function categories()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/category.php'));
    }
    
    protected function orderHistory()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/order_history.php'));
    }
    protected function userPages()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/user.php'));
    }
    
    protected function coupon()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/coupon.php'));
    }
    
    protected function redeem()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/redeem.php'));
    }
    
    protected function query()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/query.php'));
    }
    
    protected function slider()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/slider.php'));
    }
}
