<?php

namespace App\Models\JobBoard\Gig;

interface GigPriceOptionFields
{

    public const TABLE_NAME = 'gig_price_options';

    public const FIELD_ID = 'id';
    public const FIELD_CREATED_AT = 'created_at';
    public const FIELD_UPDATED_AT = 'updated_at';

    public const FIELD_GIG_PRICE_ID = 'gig_price_id';
    public const FIELD_KEY          = 'key';
    public const FIELD_VALUE        = 'value';

    public const FILLABLE = [
        self::FIELD_GIG_PRICE_ID,
        self::FIELD_KEY,
        self::FIELD_VALUE
    ];
}
