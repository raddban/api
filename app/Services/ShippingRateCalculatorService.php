<?php

namespace App\Services;

class ShippingRateCalculatorService
{
    /**
     * @var ShippingRateCalculatorInterface
     */
    private $calculator;

    public function __construct(ShippingRateCalculatorInterface $calculator)
    {

        $this->calculator = $calculator;
    }

    public function handle(ShippingRateCalculatorRequest $request): ShippingRateCalculatorResponse
    {

        $rate = $this->calculator->getRate(
            $request->getAddress(),
            $request->getCity(),
            $request->getCountryCode(),
            $request->getStateCode(),
            $request->getPostCode(),
            [
                'variant_id' => $request->getProductId(),
                'quantity' => $request->getQuantity()
            ]
        );
        return new ShippingRateCalculatorResponse($rate);
    }
}