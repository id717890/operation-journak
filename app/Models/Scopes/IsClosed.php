<?php

namespace App\Models\Scopes;

trait IsClosed
{
    public function scopeIsClosed($query)
    {
        return $query->where('end_date', '<>', null);
    }
}
