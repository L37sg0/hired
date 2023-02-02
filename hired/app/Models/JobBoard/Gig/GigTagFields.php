<?php

namespace App\Models\JobBoard\Gig;

interface GigTagFields
{
    public const TABLE_NAME = 'gig_tag';

    public const FIELD_GIG_ID = 'gig_id';
    public const FIELD_TAG_ID = 'tag_id';

    public const FILLABLE = [
        self::FIELD_GIG_ID,
        self::FIELD_TAG_ID
    ];
}
