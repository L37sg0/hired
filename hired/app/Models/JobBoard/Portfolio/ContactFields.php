<?php

namespace App\Models\JobBoard\Portfolio;

interface ContactFields
{
    public const TABLE_NAME = 'portfolio_contacts';

    public const FIELD_ID = 'id';
    public const FIELD_CREATED_AT = 'created_at';
    public const FIELD_UPDATED_AT = 'updated_at';

    public const FIELD_PORTFOLIO_ID = 'portfolio_id';
    public const FIELD_CONTACT_TYPE = 'contact_type';
    public const FIELD_VALUE        = 'value';

    public const FILLABLE = [
        self::FIELD_PORTFOLIO_ID,
        self::FIELD_CONTACT_TYPE,
        self::FIELD_VALUE
    ];

    public const CASTS = [
        self::FIELD_CONTACT_TYPE => ContactType::class
    ];
}
