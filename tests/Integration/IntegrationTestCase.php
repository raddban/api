<?php

namespace Tests\Integration;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

class IntegrationTestCase extends TestCase
{
    public const URL = 'http://localhost:8080';

    protected function request(string $method, string $url): ResponseInterface
    {
        $client = new Client([
            'base_uri' => self::URL
        ]);
        return $client->{$method}($url);
    }
}