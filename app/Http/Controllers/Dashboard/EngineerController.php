<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Engineer\FormOperJournalCreate;
use App\Infrastructure\Interfaces\Services\IDirGlobalService;
use App\Infrastructure\Interfaces\Services\IDirTypesService;
use App\Infrastructure\Interfaces\Services\IIncidentService;
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

    public function __construct(
        IIncidentService $incidentService
        , IDirTypesService $dirTypesService
        , IDirGlobalService $dirGlobalService
        , IUserService $userService
    )
    {
        $this->incidentService = $incidentService;
        $this->dirTypeService = $dirTypesService;
        $this->dirGlobalService = $dirGlobalService;
        $this->userService = $userService;
    }


    public function getOperationJournalHistory($size = 50)
    {
        return view('dashboard.engineer.operation_journal_history')
            ->with('incidents', $this->incidentService->find_incident_by_parameters($size,
                Input::get('start_date'),
                Input::get('end_date'),
                Input::get('author'),
                Input::get('dir_type'),
                Input::get('obj_caption'),
                Input::get('issue')
            ))
            ->with('sizes', config('constants.paginate_sizes'))
            ->with('types', $this->dirTypeService->get_types_cm())
            ->with('users', $this->userService->get_users_cm())
            ->with('start_date', Input::get('start_date'))
            ->with('end_date', Input::get('end_date'))
            ->with('author', Input::get('author'))
            ->with('dir_type', Input::get('dir_type'))
            ->with('obj_caption', Input::get('obj_caption'))
            ->with('issue', Input::get('issue'))
            ;
    }

    //region Оперативный журнал
    public function postOperationJournalDelete($id)
    {
        if ($this->incidentService->remove_by_id($id)) return $id; else return 0;
    }

    public function postOperationJournalEdit(FormOperJournalCreate $request, $id)
    {
        $incident = $this->incidentService->find_incident_by_id($id);
        if ($incident == null) {
            Session::flash('error_msg', 'Запись с данным id не найдена');
            return redirect()->back();
        }
        $this->incidentService->update_incident($id, Input::all());
        return redirect()->route('operation_journal');
    }

    public function getOperationJournalEdit($id)
    {
        $incident = $this->incidentService->find_incident_by_id($id);
        if ($incident == null) {
            Session::flash('error_msg', 'Запись с таким id не найдена');
            return redirect()->back();
        } else return View('dashboard.engineer.operation_journal_edit')
            ->with('types', $this->dirTypeService->get_types_cm())
            ->with('incident', $incident);
    }

    public function postFilterDirGlobalByType($id)
    {
//        try {
            $values = $this->dirGlobalService->get_objects_by_type($id);
            return View('partial.filter_objects')->with('obj_list',$values);
//            return Response::json(['success' => true, 'values' => View('partial.filter_objects')->with('obj_list',$values)]);
//        } catch (Exception $e) {
//            return Response::json(['success' => false]);
//
//        }
    }

    public function postOperationJournalCreate(FormOperJournalCreate $request)
    {
        $this->incidentService->new_incident(Input::all());
        return redirect()->route('operation_journal');
    }

    public function getOperationJournalCreate()
    {
        return view('dashboard.engineer.operation_journal_create')->with('types', $this->dirTypeService->get_types_cm());
    }

    public function getOperationJournal($size = 50)
    {
        return view('dashboard.engineer.operation_journal')
            ->with('incidents', $this->incidentService->get_opened_size($size))
            ->with('sizes', config('constants.paginate_sizes'));
    }
    //endregion
}
