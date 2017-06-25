<?php
namespace App\Infrastructure\Repository;

use App\Infrastructure\Implementation\Repository;
use Eloquent;
use Lists;

class DirGlobalRepository extends Repository
{
    function model()
    {
        return 'App\Models\DirGlobal';
    }

//    function get_objects_by_type($dir_type_id)
//    {
//        return $this->model->where('dir_type_id', '=', $dir_type_id)->orderBy('order')->get();
//    }

    function get_groups_by_type($dir_type_id)
    {
        return $this->model->where('dir_type_id', '=', $dir_type_id)->select('group_name')->distinct()->get();
    }

    function get_objects_by_type_and_group($dir_type_id, $group_name)
    {
        return $this->model->where('dir_type_id', '=', $dir_type_id)->where('group_name', '=', $group_name)->orderBy('order')->get();
    }
}