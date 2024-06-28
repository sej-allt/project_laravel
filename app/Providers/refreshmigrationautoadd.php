<?php

namespace App\Providers;

use Database\Seeders\adminseeder;
use Database\Seeders\EmailContentSeeder;
use Illuminate\Support\ServiceProvider;
use Database\Seeders;
use Database\Seeders\campusSeeder;
use Database\Seeders\gradeSeeder;
use Database\Seeders\programSeeder;
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
            programSeeder::run();
            adminseeder::run();
            EmailContentSeeder::run();
            gradeSeeder::run();
            campusSeeder::run();
        });
    }
}
