<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncidentObject extends Model
{
    protected $table = 'incident_objects';

    protected $fillable = array('incident_id', 'object_id', 'created_at', 'updated_at');

    use Relations\BelongsTo\Incident;
    use Relations\BelongsTo\Object;
}
