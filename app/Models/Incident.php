<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $table = 'incidents';

    protected $fillable = array('start_date', 'end_date', 'dir_type_id', 'object_caption', 'author_id', 'who_was_notified', 'actions', 'deadline', 'other', 'issue');

    use Relations\BelongsTo\Users;
    use Relations\BelongsTo\DirType;
    use Relations\HasMany\ObjectsOfIncident;
    use Scopes\IsClosed;
    use Scopes\IsOpened;
    use Scopes\IsDeleted;
    use Scopes\IsNotDeleted;
}
