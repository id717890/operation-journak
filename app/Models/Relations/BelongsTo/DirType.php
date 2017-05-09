<?php

namespace App\Models\Relations\BelongsTo;

trait DirType
{
    public function dir_type()
    {
        return $this->belongsTo('App\Models\DirTypes', 'dir_type_id');
    }
}