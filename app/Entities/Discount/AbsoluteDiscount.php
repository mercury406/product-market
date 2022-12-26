<?php

namespace App\Entities\Discount;

use App\Entities\Price\Price;
use App\Enums\DiscountType;
use App\Entities\Discount\Traits\DiscountMethods;
use App\Entities\Discount\Contracts\DiscountContract;


class AbsoluteDiscount implements DiscountContract
{
    use DiscountMethods; 
    
    public function __construct(Price $amount)
    {
        $this->amount = $amount;
        $this->type = DiscountType::Absolute;
    }
}