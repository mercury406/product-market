<?php 

namespace App\Entities\Discount\Contract;

interface DiscountContract 
{
    public function setAmount($amount);

    public function getAmount();

    public function toArray(): array;

    public function toJson(): string;

    public function __toString(): string;
}