<?php

namespace App\Infrastructure\Interfaces\Services;


interface IDirTypesService
{
    /**
     * Все записи из таблицы
     * @return mixed
     */
    public function get_types();


    /**
     * Выгружает список типов объектов для combobox (id,caption)
     * @return mixed
     */
    public function get_types_cm();
}