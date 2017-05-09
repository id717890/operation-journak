<?php

namespace App\Infrastructure\Interfaces\Services;


interface IDirGlobalService
{
    /**
     * Выгружает список объектов по фильтру dir_type_id
     * @param $dir_type_id
     * @return mixed
     */
    public function get_objects_by_type($dir_type_id);
}