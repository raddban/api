<?php

namespace App\Services;

class ShippingRateCalculatorResponse
{
    private $rate;

    public function __construct(array $rate)
    {

        $this->rate = $rate;
    }

    public function toArray(): array
    {
        return $this->rate;
    }
}