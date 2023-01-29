<?php

namespace App\Models\JobBoard;

interface ListingTagFields
{
    public const TABLE_NAME = 'listing_tag';

    public const FIELD_LISTING_ID   = 'listing_id';
    public const FIELD_TAG_ID       = 'tag_id';

    public const FILLABLE = [
        self::FIELD_LISTING_ID,
        self::FIELD_TAG_ID
    ];

}
