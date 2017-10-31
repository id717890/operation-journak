<?php

namespace App\Infrastructure\Interfaces\Services;


use App\Infrastructure\Interfaces\ICrud;

interface IDirGlobalService extends ICrud
{
    /**
     * Выгружает список объектов по фильтру dir_type_id
     * @param $dir_type_id
     * @return mixed
     */
    public function get_objects_by_type($dir_type_id);


    /**
     * Возвращает список объектов для списка
     * @return mixed
     */
    public function get_objects_suggest();
}