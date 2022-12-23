<?php

namespace App\Enums;

enum DiscountType: int 
{
    case Absolute = 1;
    case Percent = 2;
}