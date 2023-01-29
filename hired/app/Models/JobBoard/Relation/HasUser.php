<?php

namespace App\Models\JobBoard\Relation;

use App\Models\User;

trait HasUser
{
    /**
     * @var string
     */
    public static $REL_USER = 'user';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user() {
        return $this->hasOne(User::class);
    }
}
