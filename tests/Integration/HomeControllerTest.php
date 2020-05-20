<?php

namespace Tests\Integration;


class HomeControllerTest extends IntegrationTestCase
{
    public function testIfHomePageIsWorking(): void
    {
        $response = $this->request('get', '/');
        self::assertEquals(200, $response->getStatusCode());
    }

    public function testIfApiIsLive(): void
    {
        $response = $this->request('get', '/');
        $response = json_decode($response->getBody()->getContents());

        self::assertArrayHasKey('code', (array) $response);
        self::assertArrayHasKey('status', (array) $response);
        self::assertArrayHasKey('message', (array) $response);

        self::assertEquals(1000, $response->code);
        self::assertEquals('success', $response->status);
        self::assertEquals('Welcome to API', $response->message);
    }

    public function testRouteNotFound(): void
    {
        $response = $this->request('get', '/asd');
        $response = json_decode($response->getBody()->getContents());

        self::assertArrayHasKey('code', (array) $response);
        self::assertArrayHasKey('status', (array) $response);
        self::assertArrayHasKey('message', (array) $response);

        self::assertEquals(1010, $response->code);
        self::assertEquals('failed', $response->status);
        self::assertEquals('page not found', $response->message);
    }

    public function testMethodNotAllowed(): void
    {
        $response = $this->request('post', '/');
        $response = json_decode($response->getBody()->getContents());

        self::assertArrayHasKey('code', (array) $response);
        self::assertArrayHasKey('status', (array) $response);
        self::assertArrayHasKey('message', (array) $response);

        self::assertEquals(1020, $response->code);
        self::assertEquals('failed', $response->status);
        self::assertEquals('method not allowed', $response->message);
    }
}