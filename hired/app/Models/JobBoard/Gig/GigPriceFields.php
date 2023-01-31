<?php

namespace App\Models\JobBoard\Gig;

interface GigPriceFields
{
    public const TABLE_NAME = 'gig_prices';

    public const FIELD_ID = 'id';
    public const FIELD_CREATED_AT = 'created_at';
    public const FIELD_UPDATED_AT = 'updated_at';

    public const FIELD_GIG_ID               = 'gig_id';
    public const FIELD_TYPE                 = 'type';
    public const FIELD_DESCRIPTION          = 'description';
    public const FIELD_DELIVERY_DAYS        = 'delivery_days';
    public const FIELD_NUMBER_OF_REVISIONS  = 'number_of_revisions';

    public const FILLABLE = [
        self::FIELD_GIG_ID,
        self::FIELD_TYPE,
        self::FIELD_DESCRIPTION,
        self::FIELD_DELIVERY_DAYS,
        self::FIELD_NUMBER_OF_REVISIONS
    ];

    public const CASTS = [
        self::FIELD_TYPE => PriceType::class
    ];
}
