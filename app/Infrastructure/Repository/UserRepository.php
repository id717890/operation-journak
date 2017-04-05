<?php
namespace App\Infrastructure\Repository;

use App\Infrastructure\Implementation\Repository;
use Eloquent;

class UsersRepository extends Repository
{
    function model()
    {
        return 'App\Models\Identity\User';
    }
}