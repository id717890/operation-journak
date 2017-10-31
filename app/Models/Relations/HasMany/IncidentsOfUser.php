<?php

namespace App\Models\Relations\HasMany;

trait IncidentsOfUser
{
    public function incidents()
    {
        return $this->HasMany('App\Models\Incident', 'author_id');
    }
}