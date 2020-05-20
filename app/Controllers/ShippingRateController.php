<?php
namespace App\Controllers;

use App\Services\PrintfullShippingRateCalculator;
use App\Services\ShippingRateCalculatorRequest;
use App\Services\ShippingRateCalculatorService;

class ShippingRateController
{
    public function __invoke(): array
    {

        $service = new ShippingRateCalculatorService(
            new PrintfullShippingRateCalculator(
                'https://api.printful.com',
                '77qn9aax-qrrm-idki:lnh0-fm2nhmp0yca7'
            )
        );
        $response = $service->handle(new ShippingRateCalculatorRequest(
            '11025 Westlake Dr, Charlotte, North Carolina, 28273',
            'Charlotte',
            'US',
            'NC',
            '28273',
            7679,
            2
        ));


        return [
            'code' => 1000,
            'status' => 'success',
            'data' => $response->toArray()
        ];
    }
}