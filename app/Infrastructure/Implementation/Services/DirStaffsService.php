<?php
namespace App\Infrastructure\Implementation\Services;

use App\Infrastructure\Interfaces\Services\IDirStaffsService;
use App\Infrastructure\Repository\DirStaffsRepository;
use DB;
use Mockery\CountValidator\Exception;
use Session;
use Hash;
use Illuminate\Support\Facades\Input;

class DirStaffsService implements IDirStaffsService
{
    private $context;

    public function __construct(DirStaffsRepository $context)
    {
        $this->context = $context;
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
            $object = $this->context->find($id);
            if ($object == null) throw new Exception('Объект не найлен');
            DB::beginTransaction();
            $this->context->update([
                'fio' => Input::get('fio'),
                'phone' => Input::get('phone'),
                'post' => Input::get('post'),
                'department' => Input::get('department')
            ], $id);
            DB::commit();
            Session::flash('success_msg', 'Данные успешно сохранены');
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error_msg', $e->getMessage());
        }
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
     * Создает новый объект
     * @param $data
     * @return mixed
     */
    public function new_object($data)
    {
        try {
            DB::beginTransaction();
            $this->context->create([
                'fio' => Input::get('fio'),
                'phone' => Input::get('phone'),
                'post' => Input::get('post'),
                'department' => Input::get('department'),
            ]);
            DB::commit();
            Session::flash('success_msg', 'Новый сотрудник успешно создан');
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error_msg', $e->getMessage());
        }
    }

    /**
     * Все записи из таблицы
     * @return mixed
     */
    public function get_objects()
    {
        return $this->context->all();
    }

    /**
     * Возвращает список сотрудников+должность+место работы для списка
     * @return array
     */
    public function get_staff_suggest()
    {
        $data = [];
        $list = $this->context->all();
        foreach ($list as $item) {
            $str = $item->fio;
            if (!is_null($item->post) && $item->post != '') $str .= ' - ' . $item->post;
            if (!is_null($item->department) && $item->department != '') $str .= ' - ' . $item->department;
            $data[] = ['id' => $item->id, 'caption' => $str];
        }
        return $data;
    }

    /**
     * Получает значение по умолчания для поля "Кто был уведомлен"
     * @return mixed
     */
    public function default_staff()
    {
        $conf = config('constants.operation_journal.default_staff');
        if (!is_null($conf)) {
            $data = [];
            foreach ($conf as $item) {
                $find = $this->context->find($item);
                if (!is_null($find)) {
                    $str = $find->fio;
                    if (!is_null($find->post) && $find->post != '') $str .= ' - ' . $find->post;
                    if (!is_null($find->department) && $find->department != '') $str .= ' - ' . $find->department;
                    $data[] = ['id' => $find->id, 'caption' => $str];
                }
            }
            return count($data) > 0 ? $data : null;
        }
        return null;
    }
}