<?php

namespace App\Providers;

use App\Gallery;
use Illuminate\Support\Facades\View;
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
        View::composer([
            'partials.galleries.*'
        ], 'App\Http\ViewComposers\GalleryComposer');
    }
}