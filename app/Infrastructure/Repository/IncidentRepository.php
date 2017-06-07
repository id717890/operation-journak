<?php
namespace App\Infrastructure\Repository;

use App\Infrastructure\Implementation\Repository;
use App\Models\Incident;
use Eloquent;

class IncidentRepository extends Repository
{
    function model()
    {
        return 'App\Models\Incident';
    }

    /**
     * Инциденты не удаленные и НЕ закрытые
     * @return mixed
     */
    public function incident_opened_and_not_deleted()
    {
        return $this->model->isNotDeleted()->isOpened()->orderBy('start_date', 'desc')->paginate(25);
    }

    /**
     * Инциденты не удаленные и НЕ закрытые, с указанием кол-ва записей на странице
     * @param $size
     * @return mixed
     */
    public function incident_opened_and_not_deleted_size($size)
    {
        return $this->model->isNotDeleted()->isOpened()->orderBy('start_date', 'desc')->paginate($size);
    }

    /**
     * Инциденты не удаленные и закрытые, с указанием кол-ва записей на странице
     * @param $size
     * @return mixed
     */
    public function incident_closed_and_not_deleted_size($size)
    {
        return $this->model->isNotDeleted()->isClosed()->orderBy('start_date', 'desc')->paginate($size);
    }

    /**
     * Инциденты не удаленные и закрытые
     * @return mixed
     */
    public function incident_closed_and_not_deleted()
    {
        return $this->model->isNotDeleted()->isClosed()->orderBy('start_date', 'desc')->get();
    }

    public function find_incident_by_parameters($size, $start_date, $end_date, $author, $dir_type, $obj_caption, $issue)
    {
        $data = Incident::where('end_date', '!=', null)->orderBy('start_date', 'desc');
        if ($start_date != null && $end_date != null) {
//            dd('1');
            $data
                ->whereBetween('start_date', array(date("Y-m-d H:i", strtotime($start_date)), date("Y-m-d H:i", strtotime($end_date))))
                ->orWhereBetween('end_date', array(date("Y-m-d H:i", strtotime($start_date)), date("Y-m-d H:i", strtotime($end_date))));
        }
        if ($start_date != null && $end_date == null) {
//            dd('2');
            $data
                ->whereBetween('start_date', array(date("Y-m-d H:i", strtotime($start_date)), date("Y-m-d H:i",strtotime(date("Y"."-12-31 23:59")))))
                ->orWhereBetween('end_date', array(date("Y-m-d H:i", strtotime($start_date)), date("Y-m-d H:i",strtotime(date("Y"."-12-31 23:59")))));
        }

        if ($start_date == null && $end_date != null) {
//            dd('3');
            $data
                ->whereBetween('start_date', array(date("Y-m-d H:i", strtotime('1900-01-01 00:00')), date("Y-m-d H:i", strtotime($end_date))))
                ->orWhereBetween('end_date', array(date("Y-m-d H:i", strtotime('1900-01-01 00:00')), date("Y-m-d H:i", strtotime($end_date))));
        }
        if ($author != null)
            $data->where('author_id', '=', $author);
        if ($dir_type != null)
            $data->where('dir_type_id', '=', $dir_type);
        if ($obj_caption != null)
            $data->where('object_caption', 'LIKE', '%' . $obj_caption . '%');
        if ($issue != null)
            $data->where('issue', 'like', '%' . $issue . '%');
        return $data->paginate($size);
    }
}