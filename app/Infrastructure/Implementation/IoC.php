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
        $this->app->bind('App\Infrastructure\Interfaces\Services\IMailerService', 'App\Infrastructure\Implementation\Services\MailerService');
        $this->app->bind('App\Infrastructure\Interfaces\Services\IUserService', 'App\Infrastructure\Implementation\Services\UserService');
    }
}