<?php

namespace App\Services;

use GuzzleHttp\Client;

class PrintfullShippingRateCalculator implements ShippingRateCalculatorInterface
{
    private $url;
    private $apiKey;
    private $client;

    public function __construct(string $url, string $apiKey)
    {
        $this->url = $url;
        $this->apiKey = $apiKey;
        $this->client = new Client([
            'base_uri' => $url
        ]);
    }

    public function getRate(
        string $address,
        string $city,
        string $countryCode,
        string $stateCode,
        string $postcode,
        array $product = []
    ): array
    {
        $response = $this->client->post('shipping/rates',[
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode($this->apiKey),
            ],
            'body' => json_encode([
                'recipient' => [
                    'address1' => $address,
                    'city' => $city,
                    'country_code' => $countryCode,
                    'state_code' => $stateCode,
                    'zip' => $postcode
                ],
                'items' => [
                    $product
                ]
            ])
        ]);
        $response = json_decode($response->getBody()->getContents(), true);

        return $response['result'];
    }
}