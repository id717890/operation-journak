<?php
namespace App\Infrastructure\Repository;

use App\Infrastructure\Implementation\Repository;
use Eloquent;

class SettingsRepository extends Repository
{
    function model()
    {
        return 'App\Models\Settings';
    }
}