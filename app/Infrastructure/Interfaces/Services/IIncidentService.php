<?php

namespace App\Infrastructure\Interfaces\Services;


interface IIncidentService
{
    /**
     * Все записи из таблицы
     * @return mixed
     */
    public function get_all();


}