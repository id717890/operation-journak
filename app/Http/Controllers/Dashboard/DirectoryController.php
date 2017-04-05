<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DirectoryController extends Controller
{

    public function getNps()
    {
        return view('dashboard.admin.dir.nps');
    }
}
