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

    /**
     * Инциденты не удаленные и НЕ закрытые
     * @return mixed
     */
    public function incident_opened_and_not_deleted()
    {
        return $this->model->isNotDeleted()->isOpened()->orderBy('start_date', 'desc')->paginate(25);
    }

    /**
     * Инциденты не удаленные и НЕ закрытые, с указанием кол-ва записей на странице
     * @param $size
     * @return mixed
     */
    public function incident_opened_and_not_deleted_size($size)
    {
        return $this->model->isNotDeleted()->isOpened()->orderBy('start_date', 'desc')->paginate($size);
    }

    /**
     * Инциденты не удаленные и закрытые
     * @return mixed
     */
    public function incident_closed_and_not_deleted()
    {
        return $this->model->isNotDeleted()->isClosed()->orderBy('start_date', 'desc')->get();
    }
}