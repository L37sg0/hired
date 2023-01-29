<?php

namespace App\Models\JobBoard;

interface TagFields
{
    public const TABLE_NAME = 'tags';

    public const FIELD_ID = 'id';
    public const FIELD_CREATED_AT = 'created_at';
    public const FIELD_UPDATED_AT = 'updated_at';

    public const FIELD_NAME = 'name';
    public const FIELD_SLUG = 'slug';

    public const FILLABLE = [
        self::FIELD_NAME,
        self::FIELD_SLUG
    ];

}
