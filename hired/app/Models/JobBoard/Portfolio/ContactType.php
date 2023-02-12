<?php

namespace App\Models\JobBoard\Portfolio;

enum ContactType: int
{
    case Location   = 0;
    case Email      = 1;
    case Phone      = 2;
    case Website    = 3;
    case Github     = 4;
    case LinkedIn   = 5;
}
