<?php

namespace App\Models\JobBoard\Portfolio;

enum PortfolioType: int
{
    case Freelancer = 1;
    case Company    = 2;
    case Agency     = 3;
}
