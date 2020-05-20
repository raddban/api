<?php

namespace App\Services;

interface ShippingRateCalculatorInterface
{
    public function getRate(
        string $address,
        string $city,
        string $countryCode,
        string $stateCode,
        string $postcode,
        array $product = []
    ): array;
}