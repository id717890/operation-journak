<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Engineer\FormOperJournalCreate;
use App\Infrastructure\Interfaces\Services\IDirGlobalService;
use App\Infrastructure\Interfaces\Services\IDirTypesService;
use App\Infrastructure\Interfaces\Services\IIncidentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Response;


class EngineerController extends Controller
{
    private $incidentService;
    private $dirTypeService;
    private $dirGlobalService;

    public function __construct(
        IIncidentService $incidentService
        , IDirTypesService $dirTypesService
        , IDirGlobalService $dirGlobalService
    )
    {
        $this->incidentService = $incidentService;
        $this->dirTypeService = $dirTypesService;
        $this->dirGlobalService = $dirGlobalService;
    }

    public function postFilterDirGlobalByType($id)
    {
        try {
            $values = $this->dirGlobalService->get_objects_by_type($id);
            return Response::json(['success' => true, 'values' => $values]);
        } catch (Exception $e) {
            return Response::json(['success' => false]);

        }
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

    public function getOperationJournal()
    {
        return view('dashboard.engineer.operation_journal')->with('incidents', $this->incidentService->get_all());
    }
}
