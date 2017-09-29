<?php
namespace App\Infrastructure\Repository;

use App\Infrastructure\Implementation\Repository;
use Eloquent;

class IncidentObjectRepository extends Repository
{
    function model()
    {
        return 'App\Models\IncidentObject';
    }
}