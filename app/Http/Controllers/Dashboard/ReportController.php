<?php

namespace App\Http\Controllers\Dashboard;

use App\Infrastructure\Interfaces\Services\IReportService;
use App\Infrastructure\Interfaces\Services\IIncidentService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Auth;


class ReportController extends Controller
{
    private $incidentService;
    private $reportService;

    public function __construct(
        IIncidentService $incidentService
        , IReportService $reportService
    )
    {
        $this->incidentService = $incidentService;
        $this->reportService = $reportService;
    }

    //region Экспорт в файл
    public function getExportJournalToExcel()
    {
        $start_date = !is_null(Input::get('start_date')) ? Input::get('start_date') : date('Y-m-d H:i', strtotime(date('Y-m-d') . ' 00:00'));
        $end_date = !is_null(Input::get('end_date')) ? Input::get('end_date') : date('Y-m-d H:i', strtotime(date('Y-m-d') . ' 23:59'));

        $title = 'Данные за смену ' . date('d.m.y H:i', strtotime($start_date)) . ' - ' . date('d.m.y H:i', strtotime($end_date)) . '. Выгрузил ' . Auth::user()->name;
        $this->reportService->export_journal_to_excel($this->incidentService->find_incident_by_dates(0, $start_date, $end_date), $title);
    }
    //endregion

}
