<?php

namespace App\Models\Scopes;

trait IsNotDeleted
{
    public function scopeIsNotDeleted($query)
    {
        return $query->where('is_delete', '=', false);
    }
}
