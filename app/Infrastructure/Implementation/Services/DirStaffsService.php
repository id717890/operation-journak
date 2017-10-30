<?php
namespace App\Infrastructure\Implementation\Services;

use App\Infrastructure\Interfaces\Services\IDirStaffsService;
use App\Infrastructure\Repository\DirStaffsRepository;
use DB;
use Mockery\CountValidator\Exception;
use Session;
use Hash;
use Illuminate\Support\Facades\Input;

class DirStaffsService extends BaseCrudService implements IDirStaffsService
{
    public function __construct(DirStaffsRepository $context)
    {
        parent::__construct($context);
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