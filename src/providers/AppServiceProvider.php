<?php

namespace iLaravel\iSMS\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(isms_path('config/isms.php'), 'ilaravel.isms');

        if($this->app->runningInConsole())
        {
            if (isms('database.migrations.include', true)) $this->loadMigrationsFrom(isms_path('database/migrations'));
        }
    }

    public function register()
    {
        parent::register();
    }
}
