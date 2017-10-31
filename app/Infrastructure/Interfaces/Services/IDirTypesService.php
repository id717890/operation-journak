<?php

namespace App\Infrastructure\Interfaces\Services;
use App\Infrastructure\Interfaces\ICrud;


interface IDirTypesService extends ICrud
{
//    /**
//     * Удаляет тип из базы
//     * @param $id
//     * @return mixed
//     */
//    public function remove_type($id);
//    /**
//     * Обновляет тип объекта
//     * @param $id
//     * @param $data
//     * @return mixed
//     */
//    public function update_type($id, $data);
//
//    /**
//     * Поиск типа по id
//     * @param $id
//     * @return mixed
//     */
//    public function find_type_by_id($id);
//
//    /**
//     * Создает новый тип объекта
//     * @param $data
//     * @return mixed
//     */
//    public function new_object_type($data);
//
//    /**
//     * Все записи из таблицы
//     * @return mixed
//     */
//    public function get_types();


    /**
     * Выгружает список типов объектов для combobox (id,caption)
     * @return mixed
     */
    public function get_types_cm();
}