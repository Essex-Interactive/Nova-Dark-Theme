<?php

namespace EssexInteractive\NovaDarkTheme;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider
{

    /**
     * Custom commands for the dark theme
     *
     * @var array
     */
    protected $commands = [
        'EssexInteractive\NovaDarkTheme\Commands\AddSwitch',
        'EssexInteractive\NovaDarkTheme\Commands\RemoveSwitch',
        'EssexInteractive\NovaDarkTheme\Commands\On',
        'EssexInteractive\NovaDarkTheme\Commands\Off',
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::style('nova-dark-theme', __DIR__ . '/../dist/css/theme.css');
            Nova::script('nova-dark-theme', __DIR__ . '/../dist/js/theme.js');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
    }

}
