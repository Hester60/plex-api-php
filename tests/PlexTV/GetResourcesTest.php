<?php

namespace Tests\PlexTV;

use GuzzleHttp\Exception\GuzzleException;
use Hester60\PlexApiPhp\Exceptions\DeserializeException;
use JsonException;
use Tests\BaseTestCase;

final class GetResourcesTest extends BaseTestCase
{
    private array $fakeResponse = [
        [
            'name' => 'Resource 1',
            'product' => 'Plex',
            'productVersion' => '1.0.0',
            'platform' => 'Windows',
            'platformVersion' => '10',
            'device' => 'PC',
            'clientIdentifier' => 'abc123',
            'createdAt' => '2025-02-01T12:00:00Z',
            'lastSeenAt' => '2025-02-15T12:00:00Z',
            'provides' => 'streaming',
            'ownerId' => 'user123',
            'sourceTitle' => 'Plex Media Server',
            'publicAddress' => '192.168.1.100',
            'accessToken' => 'abcdef123456',
            'owned' => true,
            'home' => true,
            'synced' => true,
            'relay' => false,
            'presence' => true,
            'httpsRequired' => true,
            'publicAddressMatches' => true,
            'dnsRebindingProtection' => true,
            'natLoopbackSupported' => true,
            'connection' => [
                'protocol' => 'http',
                'address' => '192.168.1.100',
                'port' => 32400,
                'uri' => '/resource/1',
                'local' => true,
                'relay' => false,
                'IPv6' => false,
            ],
            'connections' => [
                [
                    'protocol' => 'https',
                    'address' => '192.168.1.100',
                    'port' => 443,
                    'uri' => '/resource/2',
                    'local' => false,
                    'relay' => true,
                    'IPv6' => true,
                ]
            ],
        ],
    ];

    /**
     * @throws GuzzleException
     * @throws DeserializeException
     * @throws JsonException
     */
    public function test_get_resources_response(): void
    {
        $requests = [];
        $plexClient = $this->createPlexClientWithMockHttpClient($this->fakeResponse, $requests);

        $response = $plexClient->plexTV->getResources('auth-token', 'client-identifier');

        $this->assertCount(1, $requests);
        $request = $requests[0]['request'];

        $this->assertEquals('https://plex.tv/api/v2/resources?X-Plex-Token=auth-token&X-Plex-Client-Identifier=client-identifier&includeHttps=0', (string)$request->getUri());
        $this->assertEquals('GET', $request->getMethod());

        $resources = $response->getResources();
        $this->assertCount(1, $resources);
        $resource = $resources[0];

        $this->assertEquals('Resource 1', $resource->getName());
        $this->assertEquals('Plex', $resource->getProduct());
        $this->assertEquals('1.0.0', $resource->getProductVersion());
        $this->assertEquals('Windows', $resource->getPlatform());
        $this->assertEquals('10', $resource->getPlatformVersion());
        $this->assertEquals('PC', $resource->getDevice());
        $this->assertEquals('abc123', $resource->getClientIdentifier());
        $this->assertEquals('2025-02-01T12:00:00Z', $resource->getCreatedAt());
        $this->assertEquals('2025-02-15T12:00:00Z', $resource->getLastSeenAt());
        $this->assertEquals('streaming', $resource->getProvides());
        $this->assertEquals('user123', $resource->getOwnerId());
        $this->assertEquals('Plex Media Server', $resource->getSourceTitle());
        $this->assertEquals('192.168.1.100', $resource->getPublicAddress());
        $this->assertEquals('abcdef123456', $resource->getAccessToken());
        $this->assertTrue($resource->isOwned());
        $this->assertTrue($resource->isHome());
        $this->assertTrue($resource->isSynced());
        $this->assertFalse($resource->isRelay());
        $this->assertTrue($resource->isPresence());
        $this->assertTrue($resource->isHttpsRequired());
        $this->assertTrue($resource->isPublicAddressMatches());
        $this->assertTrue($resource->isDnsRebindingProtection());
        $this->assertTrue($resource->isNatLoopbackSupported());

        $connection = $resource->getConnection();
        $this->assertEquals('http', $connection->getProtocol());
        $this->assertEquals('192.168.1.100', $connection->getAddress());
        $this->assertEquals(32400, $connection->getPort());
        $this->assertEquals('/resource/1', $connection->getUri());
        $this->assertTrue($connection->isLocal());
        $this->assertFalse($connection->isRelay());
        $this->assertFalse($connection->isIPv6());

        $connections = $resource->getConnections();
        $this->assertCount(1, $connections);

        $connection2 = $connections[0];
        $this->assertEquals('https', $connection2->getProtocol());
        $this->assertEquals('192.168.1.100', $connection2->getAddress());
        $this->assertEquals(443, $connection2->getPort());
        $this->assertEquals('/resource/2', $connection2->getUri());
        $this->assertFalse($connection2->isLocal());
        $this->assertTrue($connection2->isRelay());
    }
}