<?php

namespace Tests\PlexTV;

use GuzzleHttp\Exception\GuzzleException;
use Hester60\PlexApiPhp\Exceptions\DeserializeException;
use JsonException;
use Tests\BaseTestCase;

final class GetServerTest extends BaseTestCase
{
    private array $fakeResponse = [
        'name' => 'My Plex Server',
        'address' => '192.168.1.100',
        'port' => 32400,
        'version' => '1.23.0',
        'scheme' => 'http',
        'synced' => true,
        'owned' => true,
        'localAddresses' => '192.168.1.100,192.168.1.101',
        'machineIdentifier' => 'abc123-machine-id',
        'createdAt' => 1588315200,
        'updatedAt' => 1590993600,
        'librarySections' => [
            [
                'id' => 1,
                'key' => 1001,
                'title' => 'Movies',
                'type' => 'movie',
            ],
            [
                'id' => 2,
                'key' => 1002,
                'title' => 'TV Shows',
                'type' => 'show',
            ]
        ]
    ];

    /**
     * @throws GuzzleException
     * @throws DeserializeException
     * @throws JsonException
     */
    public function test_get_server_response(): void
    {
        $requests = [];
        $plexClient = $this->createPlexClientWithMockHttpClient($this->fakeResponse, $requests);

        $response = $plexClient->plexTV->getServer('auth-token', 'machine-id');

        $this->assertCount(1, $requests);
        $request = $requests[0]['request'];

        $this->assertEquals('https://plex.tv/api/v2/servers/machine-id?X-Plex-Token=auth-token', (string) $request->getUri());
        $this->assertEquals('GET', $request->getMethod());

        $this->assertEquals('My Plex Server', $response->getName());
        $this->assertEquals('192.168.1.100', $response->getAddress());
        $this->assertEquals(32400, $response->getPort());
        $this->assertEquals('1.23.0', $response->getVersion());
        $this->assertEquals('http', $response->getScheme());
        $this->assertTrue($response->isSynced());
        $this->assertTrue($response->isOwned());
        $this->assertEquals('192.168.1.100,192.168.1.101', $response->getLocalAddresses());
        $this->assertEquals('abc123-machine-id', $response->getMachineIdentifier());
        $this->assertEquals(1588315200, $response->getCreatedAt());
        $this->assertEquals(1590993600, $response->getUpdatedAt());

        $librarySections = $response->getLibrarySections();
        $this->assertCount(2, $librarySections);

        $library1 = $librarySections[0];
        $this->assertEquals(1, $library1->getId());
        $this->assertEquals(1001, $library1->getKey());
        $this->assertEquals('Movies', $library1->getTitle());
        $this->assertEquals('movie', $library1->getType());

        $library2 = $librarySections[1];
        $this->assertEquals(2, $library2->getId());
        $this->assertEquals(1002, $library2->getKey());
        $this->assertEquals('TV Shows', $library2->getTitle());
        $this->assertEquals('show', $library2->getType());
    }
}