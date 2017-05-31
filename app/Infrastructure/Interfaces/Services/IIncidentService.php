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

    /**
     * Поиск записи в оперативном журнале по id записи
     * @param $id
     * @return mixed
     */
    public function find_incident_by_id($id);

    /**
     * Редактирование записи в оперативном журнале
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update_incident($id, $data);


}