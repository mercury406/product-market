<?php

namespace App\Entities\Price;

use App\Enums\Currency;

class Price
{
    private int|float $amount;
    private Currency $currency;

    public function __construct(int|float $amount, Currency $currency)
    {
        $this->amount = $amount * 100;
        $this->currency = $currency;
    }

    public function getAmount()
    {
        return $this->amount;
    }
    
    public function setAmount(int|float $amount)
    {
        $this->amount = $amount;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency(Currency $currency)
    {
        $this->currency = $currency;
    }

}