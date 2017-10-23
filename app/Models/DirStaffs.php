<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DirStaffs extends Model
{
    protected $table = 'dir_staffs';

    protected $fillable = array('fio', 'phone', 'post', 'department');
}
