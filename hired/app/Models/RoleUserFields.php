<?php

namespace App\Models;

interface RoleUserFields
{
    public const TABLE_NAME = 'role_user';

    public const FIELD_ROLE_ID = 'role_id';
    public const FIELD_USER_ID = 'user_id';

    public const FILLABLE = [
        self::FIELD_ROLE_ID,
        self::FIELD_USER_ID
    ];

    public const CASTS = [
        self::FIELD_ROLE_ID => Role::class
    ];
}
