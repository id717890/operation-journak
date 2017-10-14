<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DirTypes extends Model
{
    protected $table = 'dir_types';

    protected $fillable = array('caption');

    use Relations\HasMany\ObjectsOfType;
}
