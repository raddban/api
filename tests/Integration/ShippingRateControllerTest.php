<?php

namespace Tests\Integration;

class ShippingRateControllerTest extends IntegrationTestCase
{
    public function testSuccessful(): void
    {
        $response = $this->request('post', '/shipping-rate');

        var_dump($response->getBody()->getContents());
//        var_dump($response->getBody()->getContents());
    }
}