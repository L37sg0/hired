<?php

namespace App\Models\JobBoard\Relation;

use App\Models\JobBoard\Tag;

trait BelongsToManyTags
{
    /**
     * @var string
     */
    public static $REL_TAGS = 'tags';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
