<?php
namespace App\Infrastructure\Implementation\Services;

use App\Infrastructure\Interfaces\Services\IDirTypesService;
use App\Infrastructure\Repository\DirTypeRepository;
use DB;
use Mockery\CountValidator\Exception;
use Session;
use Hash;
use Illuminate\Support\Facades\Input;

class DirTypesService implements IDirTypesService
{
    private $context;

    public function __construct(DirTypeRepository $context)
    {
        $this->context = $context;
    }

    /**
     * Все записи из таблицы
     * @return mixed
     */
    public function get_types()
    {
        return $this->context->all();
    }

    /**
     * Выгружает список типов объектов для combobox (id,caption)
     * @return mixed
     */
    public function get_types_cm()
    {
        $values = [];
        foreach ($this->context->all_sorted('asc', 'caption') as $item)
            $values[$item->id] = $item->caption;
        return $values;
    }

    /**
     * Создает новый тип объекта
     * @param $data
     * @return mixed
     */
    public function new_object_type($data)
    {
        try {
            DB::beginTransaction();
            $this->context->create([
                'caption' => Input::get('caption')
            ]);
            DB::commit();
            Session::flash('success_msg', 'Новый тип объекта успешно создан');
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error_msg', $e->getMessage());
        }
    }

    /**
     * Поиск типа по id
     * @param $id
     * @return mixed
     */
    public function find_type_by_id($id)
    {
        return $this->context->find($id);
    }

    /**
     * Обновляет тип объекта
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update_type($id, $data)
    {
        try {
            $type = $this->context->find($id);
            if ($type == null) throw new Exception('Тип объекта не найден');
            DB::beginTransaction();
            $this->context->update([
                'caption' => Input::get('caption')
            ], $id);
            DB::commit();
            Session::flash('success_msg', 'Данные успешно сохранены');
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error_msg', $e->getMessage());
        }
    }

    /**
     * Удаляет тип из базы
     * @param $id
     * @return mixed
     */
    public function remove_type($id)
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
            DB::rollBack();
            return false;
        }
    }
}