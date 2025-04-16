<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });

        parent::boot(); // Ensure the parent boot method is called
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}

//namespace App\Providers;
//
//use Illuminate\Cache\RateLimiting\Limit;
//use Illuminate\Support\Facades\RateLimiter;
//use Illuminate\Support\Facades\Request;
//use Illuminate\Support\Facades\Route;
//use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
//
//class RouteServiceProvider extends ServiceProvider
//{
//    /**
//     * The path to your application's "home" route.
//     *
//     * Typically, users are redirected here after authentication.
//     *
//     * @var string
//     */
//    public const HOME = '/home';
//
//    /**
//     * Register services.
//     */
//    public function register(): void
//    {
//        //
//    }
//
//    /**
//     * Bootstrap services.
//     */
//    /**
//     * Define your route model bindings, pattern filters, etc.
//     *
//     * @return void
//     */
//    public function boot(): void
//    {
//        //
//
//        $this->configureRateLimiting();
//
//        $this->routes(function () {
//            Route::middleware('api')
//                ->prefix('api')
//                ->group(base_path('routes/api.php'));
//
//            Route::middleware('web')
//                ->group(base_path('routes/web.php'));
//        });
//
//        // Example of route model binding (you might have more or different bindings)
//        // Route::model('user', \App\Models\User::class);
//
//        parent::boot();
//    }
//
//    /**
//     * Configure the rate limiters for the application.
//     *
//     * @return void
//     */
//    protected function configureRateLimiting(): void
//    {
//        // Example of defining a rate limiter (you might have more or different limiters)
//         RateLimiter::for('api', function (Request $request) {
//             return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
//         });
//    }
//
//    protected function routes(\Closure $routesCallback)
//    {
//
//    }
//}
//
