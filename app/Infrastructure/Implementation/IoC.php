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
        $this->app->bind('App\Infrastructure\Interfaces\Services\IDirStaffsService', 'App\Infrastructure\Implementation\Services\DirStaffsService');
        $this->app->bind('App\Infrastructure\Interfaces\Services\IDirIssuesService', 'App\Infrastructure\Implementation\Services\DirIssuesService');
        $this->app->bind('App\Infrastructure\Interfaces\Services\ISettingsService', 'App\Infrastructure\Implementation\Services\SettingsService');
        $this->app->bind('App\Infrastructure\Interfaces\Services\IReportService', 'App\Infrastructure\Implementation\Services\ReportService');
        $this->app->bind('App\Infrastructure\Interfaces\Services\IDirGlobalService', 'App\Infrastructure\Implementation\Services\DirGlobalService');
        $this->app->bind('App\Infrastructure\Interfaces\Services\IDirTypesService', 'App\Infrastructure\Implementation\Services\DirTypesService');
        $this->app->bind('App\Infrastructure\Interfaces\Services\IUserService', 'App\Infrastructure\Implementation\Services\UserService');
        $this->app->bind('App\Infrastructure\Interfaces\Services\IIncidentService', 'App\Infrastructure\Implementation\Services\IncidentService');
        $this->app->bind('App\Infrastructure\Interfaces\Services\IMailerService', 'App\Infrastructure\Implementation\Services\MailerService');
    }
}