<?php

namespace App\Models\Scopes;

trait IsOpened
{
    public function scopeIsOpened($query)
    {
        return $query->where('end_date', '=', null);
    }
}
