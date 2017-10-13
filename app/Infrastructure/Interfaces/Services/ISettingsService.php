<?php

namespace App\Infrastructure\Interfaces\Services;


interface ISettingsService
{
    public function change_settings($key, $value);

    public function get($key);

    public function get_settings();

    /**
     * Проверяет доступно ли редактирование записи
     * Проверяет прошло ли "inspire_minutes" между временем редактирования и текущим временем
     * @param $date
     * @return mixed
     */
    public function is_allow_edit($date);
}