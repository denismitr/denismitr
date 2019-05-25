<?php

namespace App\Providers;

use App\Helpers\Image;
use App\Models\Business;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Intervention\Image\ImageManager;
use Parsedown;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view) {
            $business = Cache::rememberForever('business', function() {
                return Business::firstOrFail();
            });

            $view->with('business', $business);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Image::class, function($app) {
            return new Image(
                new ImageManager([
                    'driver' => $app['config']['services.images.driver']
                ])
            );
        });

        $this->app->bind('md', function() {
            $parser = new Parsedown();

            return $parser;
        });

        if ($this->app->environment() !== 'production') {
            $this->app->register(IdeHelperServiceProvider::class);
        }
    }
}
