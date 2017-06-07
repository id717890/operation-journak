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

    /**
     * Инциденты не удаленные и НЕ закрытые
     * @return mixed
     */
    public function all_not_deleted()
    {
        return $this->model->isNotDeleted()->orderBy('name')->get();
    }
}