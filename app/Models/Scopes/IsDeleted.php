<?php

namespace App\Models\Scopes;

trait IsDeleted
{
    public function scopeIsDeleted($query)
    {
        return $query->where('is_delete', '=', true);
    }
}
