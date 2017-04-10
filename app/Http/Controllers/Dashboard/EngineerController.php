<?php

namespace App\Http\Controllers\Dashboard;

use App\Infrastructure\Interfaces\Services\IIncidentService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EngineerController extends Controller
{
    private $myService;

    public function __construct(IIncidentService $incidentService)
    {
        $this->incidentService=$incidentService;
    }

    public function getOperationJournal()
    {
        return view('dashboard.engineer.operation_journal')->with('incidents',$this->incidentService->get_all());
    }
}
