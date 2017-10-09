<?php
namespace App\Infrastructure\Repository;

use App\Infrastructure\Implementation\Repository;
use App\Models\Incident;
use Eloquent;
use DB;

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

    public function find_incident_by_parameters($size, $start_date, $end_date, $author, $dir_type, $objects, $issue)
    {
        $data = Incident::where('end_date', '!=', null)->orderBy('start_date', 'desc');

        $sql = 'select i.* from incidents i';

        if ($objects != null) {
            $data->whereHas('objects', function ($q) use ($objects) {
                $q->whereIn('object_id', explode(',', $objects));
            });

            $sql .= ' join incident_objects io on io.incident_id=i.id and io.object_id in (\'' . $objects . '\')';
        }

        $sql .= ' where end_date is not null';

//        dd($objects);

        if ($start_date != null && $end_date != null) {
//            dd('1');
            $data->whereBetween('start_date', array(date("Y-m-d H:i", strtotime($start_date)), date("Y-m-d H:i", strtotime($end_date))));
//                ->orWhereBetween('end_date', array(date("Y-m-d H:i", strtotime($start_date)), date("Y-m-d H:i", strtotime($end_date))));

            $sql .= ' and i.start_date>=\'' . date("Y-m-d H:i", strtotime($start_date)) . '\' and i.start_date<=\'' . date("Y-m-d H:i", strtotime($end_date)) . '\'';
        }
        if ($start_date != null && $end_date == null) {
//            dd('2');
            $data
                ->whereBetween('start_date', array(date("Y-m-d H:i", strtotime($start_date)), date("Y-m-d H:i", strtotime(date("Y" . "-12-31 23:59")))));
//                ->orWhereBetween('end_date', array(date("Y-m-d H:i", strtotime($start_date)), date("Y-m-d H:i",strtotime(date("Y"."-12-31 23:59")))));
            $sql .= ' and i.start_date>=\'' . date("Y-m-d H:i", strtotime($start_date)) . '\' and i.start_date<=\'' . date("Y-m-d H:i", strtotime(date("Y" . "-12-31 23:59"))) . '\'';
        }

        if ($start_date == null && $end_date != null) {
//            dd('3');
            $data
                ->whereBetween('start_date', array(date("Y-m-d H:i", strtotime('1900-01-01 00:00')), date("Y-m-d H:i", strtotime($end_date))));
//                ->orWhereBetween('end_date', array(date("Y-m-d H:i", strtotime('1900-01-01 00:00')), date("Y-m-d H:i", strtotime($end_date))));
            $sql .= ' and i.start_date>=\'' . date("Y-m-d H:i", strtotime('1900-01-01 00:00')) . '\' and i.start_date<=\'' . date("Y-m-d H:i", strtotime($end_date)) . '\'';
        }
        if ($author != null) {
//            dd('4');
            $data->where('author_id', '=', $author);
            $sql .= ' and i.author_id=' . $author;
        }
        if ($dir_type != null) {
//            dd('5');
            $data->where('dir_type_id', '=', $dir_type);
            $sql .= ' and i.dir_type_id=' . $dir_type;
        }

        if ($issue != null) {
//            dd('7');
            $data->where('issue', 'like', '%' . $issue . '%');
        }
//        dd($sql);

//        $test=DB::select($sql);
//        dd($test);
        return $size==0 ? $data->get() : $data->paginate($size);
    }

    public function find_incident_by_dates($size, $start_date, $end_date)
    {
        $data = Incident::where('start_date', '>=', '1900-01-01')->orderBy('start_date', 'desc');


        if ($start_date != null && $end_date != null) {
//            dd('1');
            $data->whereBetween('start_date', array(date("Y-m-d H:i", strtotime($start_date)), date("Y-m-d H:i", strtotime($end_date))));
        }
        if ($start_date != null && $end_date == null) {
//            dd('2');
            $data->whereBetween('start_date', array(date("Y-m-d H:i", strtotime($start_date)), date("Y-m-d H:i", strtotime(date("Y" . "-12-31 23:59")))));
        }
//
        if ($start_date == null && $end_date != null) {
//            dd('3');
            $data->whereBetween('start_date', array(date("Y-m-d H:i", strtotime('1900-01-01 00:00')), date("Y-m-d H:i", strtotime($end_date))));
        }
        return $size == 0 ? $data->get() : $data->paginate($size);
    }
}