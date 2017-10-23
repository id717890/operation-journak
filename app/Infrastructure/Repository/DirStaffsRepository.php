<?php
namespace App\Infrastructure\Repository;

use App\Infrastructure\Implementation\Repository;
use Eloquent;
use Lists;

class DirStaffsRepository extends Repository
{
    function model()
    {
        return 'App\Models\DirStaffs';
    }
}