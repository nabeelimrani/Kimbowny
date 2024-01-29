<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Pet;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/userAccount';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
      Route::bind('product', function (string $value) {
        $name=str_replace('-', ' ', $value);
        return Product::where('name', $name)->firstOrFail();
      });
      Route::bind('category', function (string $value) {
        $name=str_replace('-', ' ', $value);
        return Category::where('name', $name)->firstOrFail();
      });
      Route::bind('brand', function (string $value) {
        $name=str_replace('-', ' ', $value);
        return Brand::where('name', $name)->firstOrFail();
      });
      Route::bind('pet', function (string $value) {
        $name=str_replace('-', ' ', $value);
        return Pet::where('name', $name)->firstOrFail();
      });
    }
}
