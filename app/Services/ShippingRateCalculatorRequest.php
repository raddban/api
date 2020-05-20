<?php
namespace App\Services;

class ShippingRateCalculatorRequest
{
    private $address;
    private $productId;
    private $quantity;
    private $city;
    private $countryCode;
    private $stateCode;
    private $postCode;

    public function __construct(
        string $address,
        string $city,
        string $countryCode,
        string $stateCode,
        string $postCode,
        int $productId,
        int $quantity
    )
    {


        $this->address = $address;
        $this->city = $city;
        $this->countryCode = $countryCode;
        $this->stateCode = $stateCode;
        $this->postCode = $postCode;
        $this->productId = $productId;
        $this->quantity = $quantity;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function getPostCode(): string
    {
        return $this->postCode;
    }

    public function getStateCode(): string
    {
        return $this->stateCode;
    }
}