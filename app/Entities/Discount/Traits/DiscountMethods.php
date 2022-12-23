<?php

namespace App\Entities\Discount\Traits;

trait DiscountMethods
{
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function toArray()
    {
        return [
            'amount' => $this->amount,
            'type' => $this->type
        ];
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    public function __toString(): string
    {
        return $this->toJson();
    }
}