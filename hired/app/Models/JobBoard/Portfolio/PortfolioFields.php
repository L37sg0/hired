<?php

namespace App\Models\JobBoard\Portfolio;

interface PortfolioFields
{
    public const TABLE_NAME = 'portfolios';

    public const FIELD_ID = 'id';
    public const FIELD_CREATED_AT = 'created_at';
    public const FIELD_UPDATED_AT = 'updated_at';

    public const FIELD_USER_ID          = 'user_id';
    public const FIELD_PORTFOLIO_TYPE   = 'portfolio_type';
    public const FIELD_AVATAR_URL       = 'avatar_url';
    public const FIELD_ABOUT            = 'about';

    public const FILLABLE = [
        self::FIELD_USER_ID,
        self::FIELD_PORTFOLIO_TYPE,
        self::FIELD_AVATAR_URL,
        self::FIELD_ABOUT,
    ];

    public const CASTS = [
        self::FIELD_PORTFOLIO_TYPE => PortfolioType::class
    ];

}
