<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\Admin\FormObjectTypeCreate;
use App\Infrastructure\Interfaces\Services\IDirTypesService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;


class ObjectTypeController extends Controller
{
    private $objectTypeService;

    public function __construct(IDirTypesService $objectTypeService)
    {
        $this->objectTypeService = $objectTypeService;
    }

    public function postTypeDelete($id)
    {
        if ($this->objectTypeService->remove_type($id)) return $id;
        else return 0;
    }

    public function postTypeEdit(FormObjectTypeCreate $request, $id)
    {
        $object_type = $this->objectTypeService->find_type_by_id($id);
        if ($object_type == null) {
            Session::flash('error_msg', 'Тип объекта не найден');
            return redirect()->route('object.type.edit', $id);
        }
        $this->objectTypeService->update_type($id, Input::all());
        return redirect()->route('object.type', $id);
    }

    public function getTypeEdit($id)
    {
        $object_type = $this->objectTypeService->find_type_by_id($id);
        if ($object_type == null) {
            Session::flash('error_msg', 'Тип объекта не найден');
            return redirect()->route('object.type');
        } else
            return View('dashboard.admin.object-type-edit')->with('type', $object_type);
    }

    public function postTypeCreate(FormObjectTypeCreate $request)
    {
        $this->objectTypeService->new_object_type(Input::all());
        return redirect()->route('object.type');
    }

    public function getTypeCreate()
    {
        return View('dashboard.admin.object-type-create');
    }

    public function getTypes()
    {
        return View('dashboard.admin.object-types')
            ->with('types', $this->objectTypeService->get_types());
    }
}
