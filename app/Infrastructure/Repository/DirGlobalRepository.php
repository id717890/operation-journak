<?php
namespace App\Infrastructure\Repository;

use App\Infrastructure\Implementation\Repository;
use Eloquent;

class DirGlobalRepository extends Repository
{
    function model()
    {
        return 'App\Models\DirGlobal';
    }

    function get_objects_by_type($dir_type_id)
    {
        return $this->model->where('dir_type_id', '=', $dir_type_id)->get();
    }
}