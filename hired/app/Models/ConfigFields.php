<?php

namespace App\Models;

interface ConfigFields
{
    public const TABLE_NAME = 'configs';

    public const FIELD_ID = 'id';
    public const FIELD_CREATED_AT = 'created_at';
    public const FIELD_UPDATED_AT = 'updated_at';

    public const FIELD_KEY      = 'identifier';
    public const FIELD_VALUE    = 'value';

    public const FILLABLE = [
        self::FIELD_KEY,
        self::FIELD_VALUE
    ];
}
