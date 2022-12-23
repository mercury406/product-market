<?php 

namespace App\Enums;

enum Currency: int {
    case National = 1;
    case USD = 2;
    case EUR = 3;
    case RUB = 4;
}