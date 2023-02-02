<?php

namespace App\Models\JobBoard\Gig;

enum PriceType: int
{
    case Basic      = 1;
    case Standard   = 2;
    case Premium    = 3;
}
