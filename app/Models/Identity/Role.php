<?php

namespace App\Models\Identity;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $table = 'roles';

    protected $fillable = array('name', 'display_name', 'description');
}