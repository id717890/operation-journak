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
    private $incidentObjectService;

    private $delimeter_symbol;

    public function __construct(
        IncidentRepository $context
        , IncidentObjectService $incidentObjectService
    )
    {
        $this->context = $context;
        $this->incidentObjectService = $incidentObjectService;
        $this->delimeter_symbol = config('constants.delimeter_symbol');
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
            $incident = $this->context->create([
                'start_date' => date("Y-m-d H:i:s", strtotime(Input::get('start_date'))),
                'end_date' => Input::get('end_date') != '' && !is_null(Input::get('end_date')) ? date("Y-m-d H:i:s", strtotime(Input::get('end_date'))) : null,
//                'dir_type_id' => Input::get('dir_type'),
//                'object_caption' => Input::get('obj_caption'),
                'author_id' => Auth::user()->id,
                'who_was_notified' => implode($this->delimeter_symbol, Input::get('who_was_notified')),
                'actions' => Input::get('actions'),
                'deadline' => Input::get('deadline') != '' && !is_null(Input::get('deadline')) ? date("Y-m-d H:i:s", strtotime(Input::get('deadline'))) : null,
                'other' => Input::get('other'),
                'issue' => implode($this->delimeter_symbol, Input::get('issue')),
            ]);

            $objects = Input::get('object');
            if (!is_null($objects)) {
                $insert_data = [];
                foreach ($objects as $item) {
                    array_push($insert_data, [
                        'incident_id' => $incident->id,
                        'object_id' => intval($item),
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                }
                $this->incidentObjectService->new_incident_object($insert_data);
            }
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
//                'dir_type_id' => Input::get('dir_type'),
//                'object_caption' => Input::get('obj_caption'),
                'author_id' => Auth::user()->id,
                'who_was_notified' => implode($this->delimeter_symbol, Input::get('who_was_notified')),
                'actions' => Input::get('actions'),
                'deadline' => Input::get('deadline') != '' && !is_null(Input::get('deadline')) ? date("Y-m-d H:i:s", strtotime(Input::get('deadline'))) : null,
                'other' => Input::get('other'),
                'issue' => implode($this->delimeter_symbol, Input::get('issue')),
            ], $id);

            $incident->objects()->delete();
            $objects = Input::get('object');
            if (!is_null($objects)) {
                $insert_data = [];
                foreach ($objects as $item) {
                    array_push($insert_data, [
                        'incident_id' => $incident->id,
                        'object_id' => intval($item),
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                }
                $this->incidentObjectService->new_incident_object($insert_data);
            }
            DB::commit();
            Session::flash('success_msg', 'Данные успешно сохранены');
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error_msg', $e->getMessage());
        }
    }

    /**
     * Все открытые записи
     * @return mixed
     */
    public function get_opened()
    {
        return $this->context->incident_opened_and_not_deleted();
    }

    /**
     * Все открытые записи, с указанием кол-ва записей на странице
     * @param $size
     * @return mixed
     */
    public function get_opened_size($size)
    {
        return $this->context->incident_opened_and_not_deleted_size($size);
    }

    /**
     * Все закрытые записи
     * @return mixed
     */
    public function get_closed()
    {
        return $this->context->incident_closed_and_not_deleted();
    }

    /**
     * Удаление записи по id
     * @param $id
     * @return mixed
     */
    public function remove_by_id($id)
    {
        try {
            $incident = $this->context->find($id);
            if ($incident == null) throw new Exception('Запись с указанным id в журнале не найдена');
            DB::beginTransaction();
            $this->context->update([
                'author_id' => Auth::user()->id,
                'is_delete' => true
            ], $id);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    /**
     * Все закрытые записи, с указанием кол-ва записей на странице
     * @param $size
     * @return mixed
     */
    public function get_closed_size($size)
    {
        return $this->context->incident_closed_and_not_deleted_size($size);

    }

    /**
     * Поиск записи в журнале по параметрам
     * @param $size
     * @param $start_date
     * @param $end_date
     * @param $author
     * @param $dir_type
     * @param $objects
     * @param $issue
     * @return mixed
     */
    public function find_incident_by_parameters($size, $start_date, $end_date, $author, $dir_type, $objects, $issue)
    {
        return $this->context->find_incident_by_parameters($size, $start_date, $end_date, $author, $dir_type, $objects, $issue);
    }

    /**
     * @param $size
     * @param $start_date
     * @param $end_date
     * @return mixed
     */
    public function find_incident_by_dates($size, $start_date, $end_date)
    {
        return $this->context->find_incident_by_dates($size, $start_date, $end_date);
    }
}