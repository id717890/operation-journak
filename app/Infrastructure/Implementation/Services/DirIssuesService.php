<?php
namespace App\Infrastructure\Implementation\Services;

use App\Infrastructure\Interfaces\Services\IDirIssuesService;
use App\Infrastructure\Repository\DirIssuesRepository;
use DB;
use Mockery\CountValidator\Exception;
use Session;
use Illuminate\Support\Facades\Input;

class DirIssuesService extends BaseCrudService implements IDirIssuesService
{
    public function __construct(DirIssuesRepository $context)
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