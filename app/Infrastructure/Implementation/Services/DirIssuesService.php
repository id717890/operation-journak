<?php
namespace App\Infrastructure\Implementation\Services;

use App\Infrastructure\Interfaces\Services\IDirIssuesService;
use App\Infrastructure\Repository\DirIssuesRepository;
use DB;
use Mockery\CountValidator\Exception;
use Session;
use Hash;
use Illuminate\Support\Facades\Input;

class DirIssuesService implements IDirIssuesService
{
    private $context;

    public function __construct(DirIssuesRepository $context)
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
            if ($object == null) throw new Exception('Вид мероприятия / работ / неисправности не найден');
//            if (count($type->objects) != 0) throw new Exception('Удаление не возможно, т.к. существуют связанные записи.');
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
            if ($object == null) throw new Exception('Вид мероприятия / работ / неисправности не найден');
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
                'caption' => Input::get('caption')
            ]);
            DB::commit();
            Session::flash('success_msg', 'Новый вид мероприятия / работ успешно создан');
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

    public function get_issues_json($q)
    {
        $data = [];
        if (is_null($q) || $q == '') $list = $this->context->all();
        else $list = $this->context->find_by_query($q);
        foreach ($list as $item) {
            $data[] = ['id' => $item->id, 'caption' => $item->caption];
        }
        return $data;
    }

    /**
     * Возвращает список видов неиспрвностей / работ для списка
     * @return mixed
     */
    public function get_issues_suggest()
    {
        $data = [];
        $list = $this->context->all();
        foreach ($list as $item) {
            $data[] = ['id' => $item->id, 'caption' => $item->caption];
        }
        return $data;
    }
}