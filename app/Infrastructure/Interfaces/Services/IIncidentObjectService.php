<?php

namespace App\Infrastructure\Interfaces\Services;


interface IIncidentObjectService
{
    /**
     * Создает новую запись в incident_objects
     * @param $data
     * @return mixed
     */
    public function new_incident_object($data);
}