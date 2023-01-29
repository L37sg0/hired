<?php

namespace App\Models\JobBoard;

interface ListingFields
{
    public const TABLE_NAME = 'listings';

    public const FIELD_ID = 'id';
    public const FIELD_CREATED_AT = 'created_at';
    public const FIELD_UPDATED_AT = 'updated_at';

    public const FIELD_USER_ID          = 'user_id';
    public const FIELD_TITLE            = 'title';
    public const FIELD_SLUG             = 'slug';
    public const FIELD_COMPANY          = 'company';
    public const FIELD_LOCATION         = 'location';
    public const FIELD_LOGO             = 'logo';
    public const FIELD_IS_HIGHLIGHTED   = 'is_highlighted';
    public const FIELD_IS_ACTIVE        = 'is_active';
    public const FIELD_CONTENT          = 'content';
    public const FIELD_APPLY_LINK       = 'apply_link';

    public const FILLABLE = [
        self::FIELD_USER_ID,
        self::FIELD_TITLE,
        self::FIELD_SLUG,
        self::FIELD_COMPANY,
        self::FIELD_LOCATION,
        self::FIELD_LOGO,
        self::FIELD_IS_HIGHLIGHTED,
        self::FIELD_IS_ACTIVE,
        self::FIELD_CONTENT,
        self::FIELD_APPLY_LINK,
    ];

}
