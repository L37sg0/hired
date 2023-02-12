<?php

namespace App\Models;

interface Globals
{
    public const THEME = 'jobboard';

    public const CAST_FORMAT_DATETIME_YMD   = 'datetime:Y-m-d';
    public const CAST_FORMAT_JSON           = 'json';
    public const CAST_FORMAT_ARRAY          = 'array';

    public const ON_DELETE_CASCADE = 'cascade';

    public const ENUM_FIELD_NAME    = 'name';
    public const ENUM_FIELD_VALUE   = 'value';

    public const DATE_FORMAT_YMD    = 'Y-m-d';
    public const DATEFORMAT_DMY     = 'd/m/Y';

    // FormRequest constants
    public const FORM_FIELD_REQUIRED    = 'required';
    public const FORM_FIELD_UNIQUE      = 'unique';
    public const FORM_FIELD_EXCEPT      = 'except';
    public const FORM_FIELD_EMAIL       = 'email';
    public const FORM_FIELD_CONFIRMED   = 'confirmed';

    public const SEARCH_DIVIDER = ', #';

    public const MENU_GUEST = [
        [
            'route' => 'job.list',
            'label' => 'Jobs'
        ],
        [
            'route' => 'gig.list',
            'label' => 'Gigs'
        ],
        [
            'route' => 'login',
            'label' => 'Login'
        ],
        [
            'route' => 'register',
            'label' => 'Register'
        ],
    ];
    public const MENU_AUTH  = [
        [
            'route' => 'job.list',
            'label' => 'Jobs'
        ],
        [
            'route' => 'gig.list',
            'label' => 'Gigs'
        ],
        [
            'route' => 'portfolio',
            'label' => 'My Portfolio'
        ],
        [
            'route' => 'profile',
            'label' => 'My profile'
        ],

        [
            'route' => 'logout',
            'label' => 'Logout'
        ],

    ];
}
