<?php
namespace App\Infrastructure\Implementation\Services;

use App\Infrastructure\Interfaces\Services\IDirTypesService;
use App\Infrastructure\Repository\DirTypeRepository;
use DB;
use Mockery\CountValidator\Exception;
use Session;
use Illuminate\Support\Facades\Input;

class DirTypesService extends BaseCrudService implements IDirTypesService
{
    public function __construct(DirTypeRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * Удаляет объект из базы
     * @param $id
     * @return mixed
     */
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

    /**
     * Обновляет объект
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update_object($id, $data)
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
     * Создает новый объект
     * @param $data
     * @return mixed
     */
    public function new_object($data)
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
}