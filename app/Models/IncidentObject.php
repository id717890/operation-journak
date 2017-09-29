<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncidentObject extends Model
{
    protected $table = 'incidents';

    protected $fillable = array('incident_id', 'object_id');

    use Relations\BelongsTo\Incident;
    use Relations\BelongsTo\Object;
}
