<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BaseBackendController;
use App\Http\Requests\Dashboard\Admin\FormObject;
use App\Infrastructure\Interfaces\Services\IDirGlobalService;
use App\Infrastructure\Interfaces\Services\IDirTypesService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ObjectController extends BaseBackendController
{
    private $objectTypeService;

    public function __construct(
        IDirGlobalService $service
        , IDirTypesService $objectTypeService
    )
    {
        $this->setDirectory('dashboard.admin.object');
        $this->setHeader('index', 'Объекты');
        $this->setHeader('create', 'Создание нового объекта');
        $this->setHeader('edit', 'Редактирование объекта');
        $this->setIndexRoute('object.index');
        parent::__construct($service);
        $this->objectTypeService = $objectTypeService;
    }

    function create()
    {
        return View($this->getDirectory() . '.create')
            ->with('index_route', $this->indexRoute)
            ->with('types', $this->objectTypeService->get_types_cm());
    }

    function edit($id)
    {
        $object = $this->contextService->find_object_by_id($id);
        if ($object == null) {
            Session::flash('error_msg', 'Указанный объект не найден');
            return redirect()->route($this->indexRoute);
        } else
            return View($this->getDirectory() . '.edit')
                ->with('object_item', $object)
                ->with('index_route',$this->indexRoute)
                ->with('types', $this->objectTypeService->get_types_cm());
    }

    /**
     * @param FormObject $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormObject $request)
    {
        $this->contextService->new_object(Input::all());
        return redirect()->route($this->getIndexRoute());
    }

    /**
     * @param FormObject $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormObject $request, $id)
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
