<?php

namespace App\Models\Relations\HasMany;

trait ObjectsOfIncident
{
    public function objects()
    {
        return $this->HasMany('App\Models\IncidentObject', 'incident_id');
    }
}