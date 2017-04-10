<?php
namespace App\Infrastructure\Repository;

use App\Infrastructure\Implementation\Repository;
use Eloquent;

class IncidentRepository extends Repository
{
    function model()
    {
        return 'App\Models\Incident';
    }
}