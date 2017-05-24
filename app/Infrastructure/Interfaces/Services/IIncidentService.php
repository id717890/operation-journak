<?php

namespace App\Infrastructure\Interfaces\Services;


interface IIncidentService
{
    /**
     * Все записи из таблицы
     * @return mixed
     */
    public function get_all();

    /**
     * Создает новую запись в оперативном журнале
     * @param $data
     * @return mixed
     */
    public function new_incident($data);


}