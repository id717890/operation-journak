<?php
namespace App\Infrastructure\Implementation\Services;

use App\Infrastructure\Interfaces\Services\IIncidentService;
use App\Infrastructure\Interfaces\Services\IUserService;
use App\Infrastructure\Repository\IncidentRepository;
use App\Infrastructure\Repository\UsersRepository;
use DB;
use Mockery\CountValidator\Exception;
use Session;
use Hash;
use Auth;
use Illuminate\Support\Facades\Input;

class IncidentService implements IIncidentService
{
    private $context;

    public function __construct(IncidentRepository $context)
    {
        $this->context = $context;
    }

    /**
     * Все записи из таблицы
     * @return mixed
     */
    public function get_all()
    {
        return $this->context->all();
    }

    /**
     * Создает новую запись в оперативном журнале
     * @param $data
     * @return mixed
     */
    public function new_incident($data)
    {
        try {
            DB::beginTransaction();
            $this->context->create([
                'start_date' => date("Y-m-d H:i:s", strtotime(Input::get('start_date'))),
                'end_date' => Input::get('end_date') != '' && !is_null(Input::get('end_date')) ? date("Y-m-d H:i:s", strtotime(Input::get('end_date'))) : null,
                'dir_type_id' => Input::get('dir_type'),
                'object_caption' => Input::get('obj_caption'),
                'author_id' => Auth::user()->id,
                'who_was_notified' => Input::get('who_was_notified'),
                'actions' => Input::get('actions'),
                'deadline' => Input::get('deadline') != '' && !is_null(Input::get('deadline')) ? date("Y-m-d H:i:s", strtotime(Input::get('deadline'))) : null,
                'other' => Input::get('other'),
                'issue' => Input::get('issue'),
            ]);
            DB::commit();
            Session::flash('success_msg', 'Запись успешно сохранена');
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error_msg', $e->getMessage());
        }
    }

    /**
     * Поиск записи в оперативном журнале по id записи
     * @param $id
     * @return mixed
     */
    public function find_incident_by_id($id)
    {
        try {
            $incident = $this->context->find($id);
            if ($incident == null) Session::flash('error_msg', 'Запись с таким id не найдена');
            return $incident;
        } catch (Exception $e) {
            Session::flash('error_msg', $e->getMessage());
            return null;
        }
    }

    /**
     * Редактирование записи в оперативном журнале
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update_incident($id, $data)
    {
        try {
            DB::beginTransaction();
            $incident = $this->context->find($id);
            if ($incident == null) throw new Exception('Запись не найдена');
            $this->context->update([
                'start_date' => date("Y-m-d H:i:s", strtotime(Input::get('start_date'))),
                'end_date' => Input::get('end_date') != '' && !is_null(Input::get('end_date')) ? date("Y-m-d H:i:s", strtotime(Input::get('end_date'))) : null,
                'dir_type_id' => Input::get('dir_type'),
                'object_caption' => Input::get('obj_caption'),
                'author_id' => Auth::user()->id,
                'who_was_notified' => Input::get('who_was_notified'),
                'actions' => Input::get('actions'),
                'deadline' => Input::get('deadline') != '' && !is_null(Input::get('deadline')) ? date("Y-m-d H:i:s", strtotime(Input::get('deadline'))) : null,
                'other' => Input::get('other'),
                'issue' => Input::get('issue'),
            ], $id);
            DB::commit();
            Session::flash('success_msg', 'Данные успешно сохранены');
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error_msg', $e->getMessage());
        }
    }
}