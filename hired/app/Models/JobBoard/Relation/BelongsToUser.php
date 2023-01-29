<?php

namespace App\Models\JobBoard\Relation;

use App\Models\User;

trait BelongsToUser
{
    public static $REL_USER = 'user';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
