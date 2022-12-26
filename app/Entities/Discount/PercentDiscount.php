<?php

namespace App\Entities\Discount;

use App\Enums\DiscountType;
use App\Entities\Discount\Traits\DiscountMethods;
use App\Entities\Discount\Contracts\DiscountContract;

class PercentDiscount implements DiscountContract
{
    use DiscountMethods; 

    public function __construct(int $amount)
    {
        $this->amount = $amount;
        $this->type = DiscountType::Percent;
    }

}