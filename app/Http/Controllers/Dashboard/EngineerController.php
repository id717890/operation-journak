<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EngineerController extends Controller
{
    public function getOperationJournal()
    {
        return view('dashboard.engineer.operation_journal');
    }
}
