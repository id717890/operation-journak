<?php

namespace App\Infrastructure\Interfaces;


interface ICrud
{
    /**
     * Удаляет объект из базы
     * @param $id
     * @return mixed
     */
    public function remove_object($id);

    /**
     * Обновляет объект
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update_object($id, $data);

    /**
     * Поиск объекта по id
     * @param $id
     * @return mixed
     */
    public function find_object_by_id($id);

    /**
     * Создает новый объект
     * @param $data
     * @return mixed
     */
    public function new_object($data);

    /**
     * Все записи из таблицы
     * @return mixed
     */
    public function get_objects();
}