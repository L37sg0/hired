<?php

namespace App\Models\JobBoard\Portfolio;

interface ProjectFields
{
    public const TABLE_NAME = 'portfolio_projects';

    public const FIELD_ID = 'id';
    public const FIELD_CREATED_AT = 'created_at';
    public const FIELD_UPDATED_AT = 'updated_at';

    public const FIELD_PORTFOLIO_ID = 'portfolio_id';
    public const FIELD_TITLE        = 'title';
    public const FIELD_DESCRIPTION  = 'description';
    public const FIELD_IMAGE_URL    = 'image_url';

    public const FILLABLE = [
        self::FIELD_PORTFOLIO_ID,
        self::FIELD_TITLE,
        self::FIELD_DESCRIPTION,
        self::FIELD_IMAGE_URL
    ];
}
