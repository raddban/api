<?php

namespace Tests\Unit;

use App\Services\ShippingRateCalculatorRequest;
use PHPUnit\Framework\TestCase;

class ShippingRateCalculatorRequestTest extends TestCase
{
    public function testSuccessfulRequest(): void
    {
        $request = new ShippingRateCalculatorRequest(
            'test address',
            'test city',
            'test countryCode',
            'test stateCode',
            'test postCode',
            100,
            10);

        self::assertEquals('test address', $request->getAddress());
        self::assertEquals('test city', $request->getCity());
        self::assertEquals('test countryCode', $request->getCountryCode());
        self::assertEquals('test stateCode', $request->getStateCode());
        self::assertEquals('test postCode', $request->getPostCode());
        self::assertEquals(100, $request->getProductId());
        self::assertEquals(10, $request->getQuantity());
    }
}