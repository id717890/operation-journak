<?php
namespace App\Infrastructure\Repository;

use App\Infrastructure\Implementation\Repository;
use Eloquent;

class DirTypeRepository extends Repository
{
    function model()
    {
        return 'App\Models\DirTypes';
    }
}