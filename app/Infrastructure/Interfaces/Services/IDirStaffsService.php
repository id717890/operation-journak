<?php

namespace App\Infrastructure\Interfaces\Services;


use App\Infrastructure\Interfaces\ICrud;

interface IDirStaffsService extends ICrud
{
    /**
     * Возвращает список сотрудников+должность+место работы для списка
     * @return mixed
     */
    public function get_staff_suggest();

    /**
     * Получает значение по умолчания для поля "Кто был уведомлен"
     * @return mixed
     */
    public function default_staff();

}