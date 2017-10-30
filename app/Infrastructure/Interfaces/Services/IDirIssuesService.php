<?php

namespace App\Infrastructure\Interfaces\Services;


use App\Infrastructure\Interfaces\ICrud;

interface IDirIssuesService extends ICrud
{
    /**
     * Возвращает список видов неиспрвностей / работ для списка
     * @return mixed
     */
    public function get_issues_suggest();

}