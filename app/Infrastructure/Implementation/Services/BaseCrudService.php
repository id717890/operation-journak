<?php
namespace App\Infrastructure\Implementation\Services;

use App\Infrastructure\Implementation\Repository;
use DB;
use Mockery\CountValidator\Exception;
use Session;

abstract class BaseCrudService
{
    protected $context;

    public function __construct(Repository $context)
    {
        $this->context = $context;
    }

    /**
     * Возвращает все записи таблицы
     *
     * @return mixed
     */
    public function get_objects()
    {
        return $this->context->all();
    }

    /**
     * Поиск объекта по id
     * @param $id
     * @return mixed
     */
    public function find_object_by_id($id)
    {
        return $this->context->find($id);
    }

    /**
     * Удаляет объект из базы
     * @param $id
     * @return mixed
     */
    public function remove_object($id)
    {
        try {
            $object = $this->context->find($id);
            if ($object == null) throw new Exception('Объект не найден');
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