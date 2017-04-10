<?php

namespace App\Models\Relations\BelongsTo;

trait Users
{
    public function user()
    {
        return $this->belongsTo('App\Models\Identity\User', 'author_id');
    }
}