<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DirGlobal extends Model
{
    protected $table = 'dir_global';

    protected $fillable = array('dir_type_id', 'caption', 'is_deleted');

    use Relations\BelongsTo\DirType;
    use Relations\HasMany\ObjectsOfIncidentObject;

    public function get_caption()
    {
        return $this->dir_type->caption . ' - ' . $this->caption;
    }
}
