<?php

namespace App\Infrastructure\Interfaces\Services;


use App\Infrastructure\Interfaces\ICrud;

interface IDirIssuesService extends ICrud
{
    public function get_issues_json($q);

    /**
     * Возвращает список видов неиспрвностей / работ для списка
     * @return mixed
     */
    public function get_issues_suggest();

}