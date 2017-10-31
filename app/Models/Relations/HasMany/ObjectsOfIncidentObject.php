<?php

namespace App\Models\Relations\HasMany;

trait ObjectsOfIncidentObject
{
    public function objects()
    {
        return $this->HasMany('App\Models\IncidentObject', 'object_id');
    }
}