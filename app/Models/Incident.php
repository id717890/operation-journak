<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $table = 'incidents';

    protected $fillable = array('start_date', 'end_date', 'author_id', 'who_was_notified', 'actions', 'deadline', 'other', 'issue');

    use Relations\BelongsTo\Users;
}
