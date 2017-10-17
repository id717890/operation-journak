<?php
namespace App\Infrastructure\Repository;

use App\Infrastructure\Implementation\Repository;
use Eloquent;
use Lists;

class DirIssuesRepository extends Repository
{
    function model()
    {
        return 'App\Models\DirIssues';
    }
}