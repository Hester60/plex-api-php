<?php

namespace Tests;

use Hester60\PlexApiPhp\PlexClient;
use JsonException;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

abstract class BaseTestCase extends TestCase
{
    /**
     * @throws JsonException
     */
    protected function createPlexClientWithMockHttpClient(array $fakeResponse, array &$requests): PlexClient
    {
        $httpClient = TestHelper::createMockHttpClient($fakeResponse, $requests);

        $plexClient = new PlexClient();

        $reflection = new ReflectionClass($plexClient);
        $property = $reflection->getProperty('httpClient');
        $property->setValue($plexClient, $httpClient);

        return $plexClient;
    }
}
