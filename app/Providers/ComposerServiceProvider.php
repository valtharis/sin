<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('blog.index', 'App\Composers\HomePageComposer');
        view()->composer('blog.articles', 'App\Composers\ArticlesPageComposer');
        view()->composer('blog.category', 'App\Composers\CategoryPageComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
