<?php

namespace App\Models;

interface ConfigFields
{
    public const TABLE_NAME = 'configs';

    public const FIELD_ID = 'id';
    public const FIELD_CREATED_AT = 'created_at';
    public const FIELD_UPDATED_AT = 'updated_at';

    public const FIELD_KEY      = 'key';
    public const FIELD_VALUE    = 'value';
    public const FIELD_USER_ID  = 'user_id';

    public const FILLABLE = [
        self::FIELD_KEY,
        self::FIELD_VALUE,
        self::FIELD_USER_ID
    ];

    public const CASTS = [
        self::FIELD_VALUE => Globals::CAST_FORMAT_ARRAY
    ];
}
