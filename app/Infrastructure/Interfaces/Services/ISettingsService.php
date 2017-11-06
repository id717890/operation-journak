<?php

namespace App\Infrastructure\Interfaces\Services;


use App\Infrastructure\Interfaces\ICrud;

interface ISettingsService extends ICrud
{
    public function get($key);

    /**
     * Проверяет доступно ли редактирование записи
     * Проверяет прошло ли "inspire_minutes" между временем редактирования и текущим временем
     * @param $date
     * @return mixed
     */
    public function is_allow_edit($date);
}