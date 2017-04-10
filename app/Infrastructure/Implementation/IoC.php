<?php namespace App\Infrastructure\Implementation;

use Illuminate\Support\ServiceProvider;

class IoCServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Infrastructure\Interfaces\Services\IIncidentService', 'App\Infrastructure\Implementation\Services\IncidentService');
    }
}