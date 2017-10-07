<?php

namespace App\Infrastructure\Interfaces\Services;


interface IReportService
{
    /**
     * Выгружает записи по инцидентам в файл
     * @param $incidents
     * @param $title
     * @return mixed
     */
    public function export_journal_to_excel($incidents, $title);
}