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
     * Все открытые записи
     * @return mixed
     */
    public function get_opened();

    /**
     * Все открытые записи, с указанием кол-ва записей на странице
     * @param $size
     * @return mixed
     */
    public function get_opened_size($size);

    /**
     * Все закрытые записи
     * @return mixed
     */
    public function get_closed();

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

    /**
     * Удаление записи по id
     * @param $id
     * @return mixed
     */
    public function remove_by_id($id);


}