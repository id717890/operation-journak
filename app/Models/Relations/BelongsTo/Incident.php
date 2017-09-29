<?php

namespace App\Models\Relations\BelongsTo;

trait Incident
{
    public function incident()
    {
        return $this->belongsTo('App\Models\Incident', 'incident_id');
    }
}