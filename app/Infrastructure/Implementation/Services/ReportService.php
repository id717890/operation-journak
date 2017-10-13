<?php
namespace App\Infrastructure\Implementation\Services;

use App\Infrastructure\Interfaces\Services\IReportService;
use DB;
use Mockery\CountValidator\Exception;
use Session;
use Hash;
use Auth;
use Illuminate\Support\Facades\Input;
use Excel;


class ReportService implements IReportService
{

    /**
     * Выгружает записи по инцидентам в файл
     * @param $incidents
     * @param $title
     * @return mixed
     */
    public function export_journal_to_excel($incidents, $title)
    {
        $file_name = 'journal_' . time();
        Excel::create($file_name, function ($excel) use ($incidents, $title) {
            $excel->sheet('Report', function ($sheet) use ($incidents, $title) {
                $sheetArray = [];
                $count_rows = 1;

                $sheet->setStyle(array(
                    'font' => array(
                        'name' => 'Times New Roman',
                        'size' => 12
                    )
                ));

                $sheetArray[] = [$title];
                $sheet->mergeCells('A' . $count_rows . ':H' . $count_rows);
                $count_rows++;

                $sheetArray[] = ['#', 'Начало', 'Окончание', 'Объект', 'Описание', 'Мероприятия', 'Прочее', 'Дежурный'];
                $sheet->cell('A' . $count_rows . ':H' . $count_rows, function ($cell) {
                    $cell->setFontWeight('bold');
                });

                foreach ($incidents as $key => $value) {
                    $sheetArray[] = [$key+1, date('d.m.y H:i', strtotime($value->start_date)), date('d.m.y H:i', strtotime($value->end_date)), $value->dir_type->caption.' - '.$value->object_caption, $value->issue, $value->actions, $value->other, $value->user->name];
                    $count_rows++;
                }

                $sheet->fromArray($sheetArray, null, 'A1', false, false);
//                $sheet->setAutoSize(true);
                $sheet->setWidth([
                   'A'=>4,
                   'B'=>14,
                   'C'=>14,
                   'D'=>50,
                   'E'=>60,
                   'F'=>15,
                   'G'=>15,
                   'H'=>15,
                ]);
                $sheet->getStyle('A1:H'.$count_rows)->getAlignment()->setWrapText(true);

                $sheet->cell('A1:H' . $count_rows, function ($cell) {
                    $cell->setAlignment('center');
                    $cell->setValignment('center');
                });

                $sheet->cell('D3:H' . $count_rows, function ($cell) {
                    $cell->setAlignment('left');
                    $cell->setValignment('center');
                });

                $sheet->setBorder('A1:H' . $count_rows, 'thin');
            });
        })->store('xls', storage_path('app/exports'));
        $this->file_force_download(storage_path('app/exports/' . $file_name . '.xls'));
    }

    private function file_force_download($file)
    {
        if (file_exists($file)) {
            header('X-SendFile: ' . $file);
            header('Content-Type: application/excel');
            header('Content-Disposition: attachment; filename=' . basename($file));
            readfile($file);
            exit;
        }
    }

    /**
     * @param $incidents
     * @param $title
     * @return mixed
     */
    public function export_journal_history_to_excel($incidents, $title)
    {
        $file_name = 'journal_history_' . time();
        Excel::create($file_name, function ($excel) use ($incidents, $title) {
            $excel->sheet('Report', function ($sheet) use ($incidents, $title) {
                $sheetArray = [];
                $count_rows = 1;

                $sheet->setStyle(array(
                    'font' => array(
                        'name' => 'Times New Roman',
                        'size' => 12
                    )
                ));

                $sheetArray[] = [$title];
                $sheet->mergeCells('A' . $count_rows . ':H' . $count_rows);
                $count_rows++;

                $sheetArray[] = ['#', 'Начало', 'Окончание', 'Объект', 'Описание', 'Мероприятия', 'Прочее', 'Дежурный'];
                $sheet->cell('A' . $count_rows . ':I' . $count_rows, function ($cell) {
                    $cell->setFontWeight('bold');
                });

                foreach ($incidents as $key => $value) {
                    $sheetArray[] = [$key+1, date('d.m.y H:i', strtotime($value->start_date)), date('d.m.y H:i', strtotime($value->end_date)), $value->dir_type->caption.' - '.$value->object_caption, $value->issue, $value->actions, $value->other, $value->user->name];
                    $count_rows++;
                }

                $sheet->fromArray($sheetArray, null, 'A1', false, false);
//                $sheet->setAutoSize(true);
                $sheet->setWidth([
                    'A'=>4,
                    'B'=>14,
                    'C'=>14,
                    'D'=>50,
                    'E'=>60,
                    'F'=>15,
                    'G'=>15,
                    'H'=>15,
                ]);
                $sheet->getStyle('A1:H'.$count_rows)->getAlignment()->setWrapText(true);

                $sheet->cell('A1:H' . $count_rows, function ($cell) {
                    $cell->setAlignment('center');
                    $cell->setValignment('center');
                });

                $sheet->cell('D3:H' . $count_rows, function ($cell) {
                    $cell->setAlignment('left');
                    $cell->setValignment('center');
                });

                $sheet->setBorder('A1:H' . $count_rows, 'thin');
            });
        })->store('xls', storage_path('app/exports'));
        $this->file_force_download(storage_path('app/exports/' . $file_name . '.xls'));
    }
}