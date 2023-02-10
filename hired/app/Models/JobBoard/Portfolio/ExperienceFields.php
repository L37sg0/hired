<?php

namespace App\Models\JobBoard\Portfolio;

use App\Models\Globals;

interface ExperienceFields
{
    public const TABLE_NAME = 'portfolio_experiences';

    public const FIELD_ID = 'id';
    public const FIELD_CREATED_AT = 'created_at';
    public const FIELD_UPDATED_AT = 'updated_at';

    public const FIELD_PORTFOLIO_ID     = 'portfolio_id';
    public const FIELD_START_DATE       = 'start_date';
    public const FIELD_END_DATE         = 'end_date';
    public const FIELD_COMPANY          = 'company';
    public const FIELD_DESCRIPTION      = 'description';

    public const FILLABLE = [
        self::FIELD_PORTFOLIO_ID,
        self::FIELD_START_DATE,
        self::FIELD_END_DATE,
        self::FIELD_COMPANY,
        self::FIELD_DESCRIPTION
    ];

    public const CASTS = [
        self::FIELD_START_DATE  => Globals::CAST_FORMAT_DATETIME_YMD,
        self::FIELD_END_DATE    => Globals::CAST_FORMAT_DATETIME_YMD
    ];

}
