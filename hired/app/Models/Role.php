<?php

namespace App\Models;

enum Role: int
{
    case Administrator  = 0;
    case Freelancer     = 1;
    case Company        = 2;
    case Agency         = 3;
}
