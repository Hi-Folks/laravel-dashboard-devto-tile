<?php

namespace HiFolks\DevtoTile;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class DevtoTileServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                FetchDataFromApiCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/dashboard-devto-tile'),
        ], 'dashboard-devto-tile-views');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard-devto-tile');

        Livewire::component('devto-tile', DevtoTileComponent::class);
    }
}
