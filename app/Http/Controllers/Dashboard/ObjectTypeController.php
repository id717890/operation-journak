<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BaseBackendController;
use App\Http\Requests\Dashboard\Admin\FormObjectTypeCreate;
use App\Infrastructure\Interfaces\Services\IDirTypesService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;


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


//    private $objectTypeService;
//
//    public function __construct(IDirTypesService $objectTypeService)
//    {
//        $this->objectTypeService = $objectTypeService;
//    }
//
//    public function postTypeDelete($id)
//    {
//        if ($this->objectTypeService->remove_type($id)) return $id;
//        else return 0;
//    }
//
//    public function postTypeEdit(FormObjectTypeCreate $request, $id)
//    {
//        $object_type = $this->objectTypeService->find_type_by_id($id);
//        if ($object_type == null) {
//            Session::flash('error_msg', 'Тип объекта не найден');
//            return redirect()->route('object.type.edit', $id);
//        }
//        $this->objectTypeService->update_type($id, Input::all());
//        return redirect()->route('object.type', $id);
//    }
//
//    public function getTypeEdit($id)
//    {
//        $object_type = $this->objectTypeService->find_type_by_id($id);
//        if ($object_type == null) {
//            Session::flash('error_msg', 'Тип объекта не найден');
//            return redirect()->route('object.type');
//        } else
//            return View('dashboard.admin.object-type-edit')->with('type', $object_type);
//    }
//
//    public function postTypeCreate(FormObjectTypeCreate $request)
//    {
//        $this->objectTypeService->new_object_type(Input::all());
//        return redirect()->route('object.type');
//    }
//
//    public function getTypeCreate()
//    {
//        return View('dashboard.admin.object-type-create');
//    }
//
//    public function getTypes()
//    {
//        return View('dashboard.admin.object-types')
//            ->with('types', $this->objectTypeService->get_types());
//    }
}
