<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BaseBackendController;
use App\Http\Requests\Dashboard\Admin\FormObjectTypeCreate;
use App\Infrastructure\Interfaces\Services\IDirTypesService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Session;


class ObjectTypeController extends BaseBackendController
{
    public function __construct(IDirTypesService $service)
    {
        $this->setDirectory('dashboard.admin.object-type');
        $this->setHeader('index', 'Типы объектов');
        $this->setHeader('create', 'Создание нового типа объекта');
        $this->setHeader('edit', 'Редактирование типа объекта');
        $this->setIndexRoute('object-type.index');
        parent::__construct($service);
    }

    /**
     * @param FormObjectTypeCreate $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormObjectTypeCreate $request)
    {
        $this->contextService->new_object(Input::all());
        return redirect()->route($this->getIndexRoute());
    }

    /**
     * @param FormObjectTypeCreate $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormObjectTypeCreate $request, $id)
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
