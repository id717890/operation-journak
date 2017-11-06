<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Engineer\FormOperJournalCreate;
use App\Infrastructure\Interfaces\Services\IDirGlobalService;
use App\Infrastructure\Interfaces\Services\IDirIssuesService;
use App\Infrastructure\Interfaces\Services\IDirStaffsService;
use App\Infrastructure\Interfaces\Services\IDirTypesService;
use App\Infrastructure\Interfaces\Services\IIncidentService;
use App\Infrastructure\Interfaces\Services\ISettingsService;
use App\Infrastructure\Interfaces\Services\IUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Response;
use Session;


class EngineerController extends Controller
{
    private $incidentService;
    private $dirTypeService;
    private $dirGlobalService;
    private $userService;
    private $settingsService;
    private $dirIssuesService;
    private $dirStaffsService;


    public function __construct(
        IIncidentService $incidentService
        , IDirTypesService $dirTypesService
        , IDirGlobalService $dirGlobalService
        , IUserService $userService
        , ISettingsService $settingsService
        , IDirIssuesService $dirIssuesService
        , IDirStaffsService $dirStaffsService
    )
    {
        $this->incidentService = $incidentService;
        $this->dirTypeService = $dirTypesService;
        $this->dirGlobalService = $dirGlobalService;
        $this->userService = $userService;
        $this->settingsService = $settingsService;
        $this->dirStaffsService = $dirStaffsService;

        $this->dirIssuesService = $dirIssuesService;

    }

    //region Экспорт в файл
    public function getExportJournal($size = 50)
    {
        $start_date = !is_null(Input::get('start_date')) ? Input::get('start_date') : date('Y-m-d H:i', strtotime(date('Y-m-d') . ' 00:00'));
        $end_date = !is_null(Input::get('end_date')) ? Input::get('end_date') : date('Y-m-d H:i', strtotime(date('Y-m-d') . ' 23:59'));
        return view('dashboard.engineer.export_to_file')
            ->with('incidents', $this->incidentService->find_incident_by_dates($size, $start_date, $end_date))
            ->with('start_date', $start_date)
            ->with('end_date', $end_date)
            ->with('size', $size)
            ->with('sizes', config('constants.paginate_sizes'));
    }

    //endregion

    //region История оперативного журнала
    public function getOperationJournalHistory($size = 50)
    {
        $start_date = !is_null(Input::get('start_date')) ? Input::get('start_date') : date('Y-m-d H:i', strtotime(date('Y-m-01') . ' 00:00'));
        $end_date = !is_null(Input::get('end_date')) ? Input::get('end_date') : date('Y-m-d H:i', strtotime(date('Y-m-d') . ' 23:59'));
//        dd(Input::all());
        return view('dashboard.engineer.operation_journal_history')
            ->with('incidents', $this->incidentService->find_incident_by_parameters($size,
                $start_date,
                $end_date,
                Input::get('author'),
                Input::get('dir_type'),
                Input::get('object'),
                Input::get('issue')
            ))
            ->with('sizes', config('constants.paginate_sizes'))
            ->with('types', $this->dirTypeService->get_types_cm())
            ->with('users', $this->userService->get_users_cm())
            ->with('start_date', $start_date)
            ->with('end_date', $end_date)
            ->with('author', Input::get('author'))
            ->with('dir_type', Input::get('dir_type'))
            ->with('object', Input::get('object'))
            ->with('issue', Input::get('issue'))
//            ->with('objects', Input::get('obj_id'));
            ->with('objects', $this->dirGlobalService->get_objects_suggest());

    }
    //endregion

    //region Оперативный журнал
    //region Удаление записи в оперативном журнале
    public function postOperationJournalDelete($id)
    {
        if ($this->incidentService->remove_by_id($id)) return $id; else return 0;
    }
    //endregion

    //region Редактирование записи в оперативном журнале
    public function postOperationJournalEdit(FormOperJournalCreate $request, $id)
    {
//        dd(Input::all());
        if (!is_null(old('object')))
            dd(old('object'));
        $incident = $this->incidentService->find_incident_by_id($id);
        if ($incident == null) {
            Session::flash('error_msg', 'Запись с данным id не найдена');
            return redirect()->back();
        }
        if (!$this->settingsService->is_allow_edit(is_null($incident->end_date) ? null : $incident->updated_at->format('Y-m-d H:i'))) {
            Session::flash('error_msg', 'Редактировать эту запись запрещено!');
            return redirect()->route('operation_journal');
        }
        $this->incidentService->update_incident($id, Input::all());
        return redirect()->route('operation_journal');
    }
    //endregion

    //region Представление для редактирования записи в оперативном журнале
    public function getOperationJournalEdit($id)
    {
        $incident = $this->incidentService->find_incident_by_id($id);
        if ($incident == null) {
            Session::flash('error_msg', 'Запись с таким id не найдена');
            return redirect()->route('operation_journal');
        } else {
            $allow_edit = $this->settingsService->is_allow_edit(is_null($incident->end_date) ? null : $incident->updated_at->format('Y-m-d H:i'));
            return View('dashboard.engineer.operation_journal_edit')
                ->with('staffs', $this->dirStaffsService->get_staff_suggest())
                ->with('staff_default', $this->dirStaffsService->default_staff())
                ->with('staff_selected', $incident->get_array_of_staff())
                ->with('issues', $this->dirIssuesService->get_issues_suggest())
                ->with('issue_selected', $incident->get_array_of_issue())
                ->with('objects', $this->dirGlobalService->get_objects_suggest())
                ->with('object_selected', $incident->get_array_of_object())
                ->with('incident', $incident)
                ->with('allow_edit', $allow_edit)
                ->with('department', $this->settingsService->get('department'));
        }
    }
    //endregion

    //region Фильтр объектов через Ajax
    public function postFilterDirGlobalByType($id)
    {
//        try {
        $values = $this->dirGlobalService->get_objects_by_type($id);
        return View('partial.filter_objects')
            ->with('obj_list', $values)
            ->with('obj_selected', explode(',', Input::get('objects')));

//            return Response::json(['success' => true, 'values' => View('partial.filter_objects')->with('obj_list',$values)]);
//        } catch (Exception $e) {
//            return Response::json(['success' => false]);
//
//        }
    }
    //endregion

    //region Создание новой записи в оперативном журнале
    public function postOperationJournalCreate(FormOperJournalCreate $request)
    {
        $this->incidentService->new_incident(Input::all());
        return redirect()->route('operation_journal');
    }
    //endregion

    //region Представление для новой записи в оперативном журнале
    public function getOperationJournalCreate()
    {
        return view('dashboard.engineer.operation_journal_create')
            ->with('staffs', $this->dirStaffsService->get_staff_suggest())
            ->with('staff_default', $this->dirStaffsService->default_staff())
            ->with('issues', $this->dirIssuesService->get_issues_suggest())
            ->with('objects', $this->dirGlobalService->get_objects_suggest())
            ->with('department', $this->settingsService->get('department'));
    }
    //endregion

    //region Оперативный журнал инженера
    public function getOperationJournal($size = 50)
    {
        return view('dashboard.engineer.operation_journal')
            ->with('incidents', $this->incidentService->get_opened_size($size))
            ->with('sizes', config('constants.paginate_sizes'));
    }
    //endregion
    //endregion
}
