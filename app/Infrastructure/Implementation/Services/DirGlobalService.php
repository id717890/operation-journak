<?php
namespace App\Infrastructure\Implementation\Services;

use App\Infrastructure\Interfaces\Services\IDirGlobalService;
use App\Infrastructure\Repository\DirGlobalRepository;
use App\Infrastructure\Repository\DirTypeRepository;
use DB;
use Mockery\CountValidator\Exception;
use Session;
use Hash;
use Illuminate\Support\Facades\Input;

class DirGlobalService extends BaseCrudService implements IDirGlobalService
{
    public function __construct(DirGlobalRepository $context)
    {
        parent::__construct($context);
    }

    /**
     * Выгружает список объектов по фильтру dir_type_id
     * @param $dir_type_id
     * @return mixed
     */
    public function get_objects_by_type($dir_type_id)
    {
        $data = [];
        $groups = $this->context->get_groups_by_type($dir_type_id);
        foreach ($groups as $group) {
            $obj_list = [];
            $objects = $this->context->get_objects_by_type_and_group($dir_type_id, $group->group_name);
            foreach ($objects as $object) {
                $obj_list[$object->id] = $object;
            }
            $data[$group->group_name] = $obj_list;
        }
        return $data;
    }

    /**
     * Возвращает список объектов для списка
     * @return mixed
     */
    public function get_objects_suggest()
    {
        $data = [];
        $list = $this->context->all();
        foreach ($list as $item) {
            $data[] = ['id' => $item->id, 'caption' => $item->dir_type->caption . ' - ' . $item->caption];
        }
        return $data;
    }

    /**
     * Обновляет объект
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update_object($id, $data)
    {
        try {
            $object = $this->context->find($id);
            if ($object == null) throw new Exception('Объект не найден');
            DB::beginTransaction();
            $this->context->update([
                'caption' => Input::get('caption'),
                'dir_type_id' => Input::get('object_type')
            ], $id);
            DB::commit();
            Session::flash('success_msg', 'Данные успешно сохранены');
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error_msg', $e->getMessage());
        }
    }

    /**
     * Создает новый объект
     * @param $data
     * @return mixed
     */
    public function new_object($data)
    {
        try {
            DB::beginTransaction();
            $this->context->create([
                'caption' => Input::get('caption'),
                'dir_type_id' => Input::get('object_type'),
                'group_name' => null,
                'order' => null,
                'is_deleted' => false
            ]);
            DB::commit();
            Session::flash('success_msg', 'Новый объект успешно создан');
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error_msg', $e->getMessage());
        }
    }

    public function remove_object($id)
    {
        try {
            $type = $this->context->find($id);
            if ($type == null) throw new Exception('Тип объекта не найден');
            if (count($type->objects) != 0) throw new Exception('Удаление не возможно, т.к. существуют связанные записи.');
            DB::beginTransaction();
            $this->context->delete($id);
            DB::commit();
            return true;
        } catch (Exception $e) {
            Session::flash('error_msg', $e->getMessage());
            DB::rollBack();
            return false;
        }
    }
}