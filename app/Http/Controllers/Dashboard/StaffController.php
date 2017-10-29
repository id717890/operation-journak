<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BaseBackendController;
use App\Http\Requests\Dashboard\Admin\FormStaffCreate;
use App\Infrastructure\Interfaces\Services\IDirStaffsService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;


class StaffController extends BaseBackendController
{
    public function __construct(
        IDirStaffsService $service)
    {
        $this->setDirectory('dashboard.admin.staff');
        $this->setHeader('index', 'Персонал');
        $this->setHeader('create', 'Создание нового сотрудника');
        $this->setHeader('edit', 'Редактирование сотрудника');
        $this->setIndexRoute('staff.index');
        parent::__construct($service);
    }

    /**
     * @param FormStaffCreate $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormStaffCreate $request)
    {
        $this->contextService->new_object(Input::all());
        return redirect()->route($this->getIndexRoute());
    }

    /**
     * @param FormStaffCreate $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormStaffCreate $request, $id)
    {
        $object = $this->contextService->find_object_by_id($id);
        if ($object == null) {
            Session::flash('error_msg', 'Объект не найден');
            return redirect()->route($this->indexRoute);
        }
        $this->contextService->update_object($id, Input::all());
        return redirect()->route($this->indexRoute);
    }
}
