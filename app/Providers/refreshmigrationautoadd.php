<?php

namespace App\Providers;

use Database\Seeders\adminseeder;
use Illuminate\Support\ServiceProvider;
use Database\Seeders;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Events\MigrationsEnded;

class refreshmigrationautoadd extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Event::listen(MigrationsEnded::class, function () {
            // Call your custom seeder class here
            adminseeder::run();

        });
    }
}
