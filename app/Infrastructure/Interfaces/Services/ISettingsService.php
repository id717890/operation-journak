<?php

namespace App\Infrastructure\Interfaces\Services;


interface ISettingsService
{
    public function change_settings($key, $value);

    public function get($key);

    public function get_settings();
}