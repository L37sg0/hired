<?php

namespace App\Models\JobBoard;

interface ClickFields
{
    public const TABLE_NAME = 'clicks';

    public const FIELD_ID   = 'id';
    public const FIELD_CREATED_AT   = 'created_at';
    public const FIELD_UPDATED_AT   = 'updated_at';

    public const FIELD_LISTING_ID   = 'listing_id';
    public const FIELD_USER_AGENT   = 'user_agent';
    public const FIELD_IP           = 'ip';

    public const FILLABLE = [
        self::FIELD_LISTING_ID,
        self::FIELD_USER_AGENT,
        self::FIELD_IP
    ];
}
