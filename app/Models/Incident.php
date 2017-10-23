<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $table = 'incidents';

    protected $fillable = array('start_date', 'end_date', 'author_id', 'who_was_notified', 'actions', 'deadline', 'other', 'issue');

    use Relations\BelongsTo\Users;
    use Relations\BelongsTo\DirType;
    use Relations\HasMany\ObjectsOfIncident;
    use Scopes\IsClosed;
    use Scopes\IsOpened;
    use Scopes\IsDeleted;
    use Scopes\IsNotDeleted;

    public function object_caption()
    {
        $data = [];
        foreach ($this->objects()->get() as $object) {
            $data[] = $object->object->get_caption();
        }
        return implode(', ', $data);
    }

    public function issue_caption()
    {
        $delimeter_symbol=config('constants.delimeter_symbol');
        return implode(', ', explode($delimeter_symbol, $this->issue));
    }

    public function get_array_of_staff()
    {
        $delimeter_symbol=config('constants.delimeter_symbol');
        return explode($delimeter_symbol, $this->who_was_notified);
    }

    public function get_array_of_issue()
    {
        $delimeter_symbol=config('constants.delimeter_symbol');
        return explode($delimeter_symbol, $this->issue);
    }

    public function get_array_of_object()
    {
        $data = [];
        foreach ($this->objects()->get() as $object) {
            $data[] = ['id'=>$object->object_id, 'caption'=>$object->object->get_caption()];
        }
//        dd($data);
        return $data;
    }
}
