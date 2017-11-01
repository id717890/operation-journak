<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\Admin\FormUserCreate;
use App\Http\Requests\Dashboard\Admin\FormUserEdit;
use App\Infrastructure\Interfaces\Services\IUserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Mockery\CountValidator\Exception;
use Session;

class AdminController extends Controller
{
    public function index()
    {
        return View('dashboard.admin.index');
    }
}
