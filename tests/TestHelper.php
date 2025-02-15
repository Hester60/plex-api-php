<?php

namespace Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use JsonException;

class TestHelper
{
    /**
     * @throws JsonException
     */
    public static function createMockHttpClient(array $fakeResponse, array &$requests): Client
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode($fakeResponse, JSON_THROW_ON_ERROR)),
        ]);

        $history = Middleware::history($requests);

        $handlerStack = HandlerStack::create($mock);
        $handlerStack->push($history);

        return new Client(['handler' => $handlerStack]);
    }
}
