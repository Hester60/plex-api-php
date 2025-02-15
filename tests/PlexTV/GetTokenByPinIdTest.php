<?php

namespace Tests\PlexTV;

use DateTimeImmutable;
use GuzzleHttp\Exception\GuzzleException;
use Hester60\PlexApiPhp\Api\PlexTV\Responses\Location\Location;
use Hester60\PlexApiPhp\Exceptions\DeserializeException;
use JsonException;
use Tests\BaseTestCase;

final class GetTokenByPinIdTest extends BaseTestCase
{
    private array $fakeResponse = [
        'id' => 12345,
        'code' => 'ABCDE',
        'product' => 'Plex',
        'trusted' => true,
        'qr' => 'https://example.com/qr',
        'clientIdentifier' => 'client-123',
        'location' => [
            'code' => 'US',
            'european_union_member' => false,
            'continent_code' => 'NA',
            'country' => 'United States',
            'city' => 'New York',
            'time_zone' => 'America/New_York',
            'postal_code' => '10001',
            'in_privacy_restricted_country' => false,
            'in_privacy_restricted_region' => false,
            'subdivisions' => 'NY',
            'coordinates' => '40.7128,-74.0060',
        ],
        'expiresIn' => 600,
        'createdAt' => '2025-02-15T12:00:00Z',
        'expiresAt' => '2025-02-15T12:10:00Z',
        'authToken' => 'auth-token',
        'newRegistration' => true,
    ];

    /**
     * @throws GuzzleException
     * @throws DeserializeException
     * @throws JsonException
     */
    public function test_get_token_by_pin_id(): void
    {
        $requests = [];
        $plexClient = $this->createPlexClientWithMockHttpClient($this->fakeResponse, $requests);

        $response = $plexClient->plexTV->getTokenByPinId('pin-id', 'plex-identifier');

        $this->assertCount(1, $requests);
        $request = $requests[0]['request'];

        $this->assertEquals('https://plex.tv/api/v2/pins/pin-id?X-Plex-Client-Identifier=plex-identifier', (string) $request->getUri());
        $this->assertEquals('GET', $request->getMethod());

        $this->assertEquals(12345, $response->getId());
        $this->assertEquals('ABCDE', $response->getCode());
        $this->assertEquals('Plex', $response->getProduct());
        $this->assertTrue($response->isTrusted());
        $this->assertEquals('https://example.com/qr', $response->getQrUrl());
        $this->assertEquals('client-123', $response->getClientIdentifier());
        $this->assertEquals(600, $response->getExpiresIn());
        $this->assertInstanceOf(DateTimeImmutable::class, $response->getCreatedAt());
        $this->assertInstanceOf(DateTimeImmutable::class, $response->getExpiresAt());
        $this->assertEquals('auth-token', $response->getAuthToken());
        $this->assertTrue($response->isNewRegistration());

        /** @var Location $location */
        $location = $response->getLocation();
        $this->assertEquals('US', $location->getCode());
        $this->assertFalse($location->isEuropeanUnionMember());
        $this->assertEquals('NA', $location->getContinentCode());
        $this->assertEquals('United States', $location->getCountry());
        $this->assertEquals('New York', $location->getCity());
        $this->assertEquals('America/New_York', $location->getTimeZone());
        $this->assertEquals('10001', $location->getPostalCode());
        $this->assertFalse($location->isInPrivacyRestrictedCountry());
        $this->assertFalse($location->isInPrivacyRestrictedRegion());
        $this->assertEquals('NY', $location->getSubdivisions());
        $this->assertEquals('40.7128,-74.0060', $location->getCoordinates());
    }
}