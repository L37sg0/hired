<?php

namespace App\Models\JobBoard\Portfolio;

enum PortfolioType: int
{
    case Company    = 0;
    case Freelancer = 1;
}
