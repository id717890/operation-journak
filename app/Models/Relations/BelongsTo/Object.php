<?php

namespace App\Models\Relations\BelongsTo;

trait Object
{
    public function object()
    {
        return $this->belongsTo('App\Models\DirGlobal', 'object_id');
    }
}