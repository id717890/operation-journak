<?php

namespace App\Models\Relations\HasMany;

trait ObjectsOfType
{
    public function objects()
    {
        return $this->HasMany('App\Models\DirGlobal', 'dir_type_id');
    }
}