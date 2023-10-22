<?php

namespace SellFirstPHP\SellFirstRoles;

use Illuminate\Support\ServiceProvider;
use SellFirstPHP\SellFirstRoles\Console\Commands\SellFirstRolesGenerate;
use SellFirstPHP\SellFirstRoles\Console\Commands\SellFirstRolesInstall;

class SellFirstRolesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        //Register Config file
        $this->mergeConfigFrom(__DIR__.'/../config/sell-first-roles.php', 'sell-first-roles');

        //Register Langs
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'sell-first-roles');

        //Publish Migrations
        $this->publishes([
            __DIR__.'/../config/sell-first-roles.php' => config_path('sell-first-roles.php')
        ], 'sell-first-roles-config');

        //Publish Migrations
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'sell-first-roles-migrations');

        //Register generate command
        $this->commands([
            SellFirstRolesGenerate::class,
            SellFirstRolesInstall::class
        ]);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
