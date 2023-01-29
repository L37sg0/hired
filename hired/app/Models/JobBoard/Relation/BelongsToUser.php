<?php

namespace App\Models\JobBoard\Relation;

use App\Models\User;

trait BelongsToUser
{
    /**
     * @var string
     */
    public static $REL_USER = 'user';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
