<?php

namespace Tests\PlexTV;

use GuzzleHttp\Exception\GuzzleException;
use Hester60\PlexApiPhp\Exceptions\DeserializeException;
use JsonException;
use Tests\BaseTestCase;

final class GetUserTest extends BaseTestCase
{
    private array $fakeResponse = [
        'id' => 12345,
        'uuid' => 'abc123-uuid',
        'username' => 'john_doe',
        'title' => 'John Doe',
        'email' => 'johndoe@example.com',
        'friendlyName' => 'John',
        'locale' => 'en_US',
        'confirmed' => true,
        'emailOnlyAuth' => false,
        'hasPassword' => true,
        'protected' => true,
        'thumb' => 'https://example.com/thumb.jpg',
        'authToken' => 'abcdef123456',
        'country' => 'US',
        'profile' => [
            'autoSelectAudio' => true,
            'defaultAudioAccessibility' => 1,
            'defaultAudioLanguage' => 'en',
            'defaultAudioLanguages' => ['en', 'es'],
            'defaultSubtitleLanguage' => 'en',
            'defaultSubtitleLanguages' => ['en', 'es'],
            'autoSelectSubtitle' => 1,
            'defaultSubtitleAccessibility' => 2,
            'defaultSubtitleForced' => 1,
            'watchedIndicator' => 1,
            'mediaReviewsVisibility' => 1,
            'mediaReviewsLanguages' => ['en', 'fr'],
        ],
        'subscription' => [
            'active' => true,
            'subscribedAt' => '2025-01-01',
            'status' => 'active',
            'paymentService' => 'paypal',
            'plan' => 'premium',
            'features' => ['feature1', 'feature2'],
        ],
        'subscriptions' => [
            [
                'active' => true,
                'subscribedAt' => '2025-01-01',
                'status' => 'active',
                'paymentService' => 'paypal',
                'plan' => 'premium',
                'features' => ['feature1', 'feature2'],
            ],
        ]
    ];

    /**
     * @throws GuzzleException
     * @throws DeserializeException
     * @throws JsonException
     */
    public function test_get_user_response(): void
    {
        $requests = [];
        $plexClient = $this->createPlexClientWithMockHttpClient($this->fakeResponse, $requests);

        $response = $plexClient->plexTV->getUser('auth-token');

        $this->assertCount(1, $requests);
        $request = $requests[0]['request'];

        $this->assertEquals('https://plex.tv/api/v2/user?X-Plex-Token=auth-token', (string)$request->getUri());
        $this->assertEquals('GET', $request->getMethod());

        $this->assertEquals(12345, $response->getId());
        $this->assertEquals('abc123-uuid', $response->getUuid());
        $this->assertEquals('john_doe', $response->getUsername());
        $this->assertEquals('John Doe', $response->getTitle());
        $this->assertEquals('johndoe@example.com', $response->getEmail());
        $this->assertEquals('John', $response->getFriendlyName());
        $this->assertEquals('en_US', $response->getLocale());
        $this->assertTrue($response->isConfirmed());
        $this->assertFalse($response->isEmailOnlyAuth());
        $this->assertTrue($response->hasPassword());
        $this->assertTrue($response->isProtected());
        $this->assertEquals('https://example.com/thumb.jpg', $response->getThumb());
        $this->assertEquals('abcdef123456', $response->getAuthToken());
        $this->assertEquals('US', $response->getCountry());
        $this->assertNull($response->getJoinedAt());


        $profile = $response->getProfile();
        $this->assertTrue($profile->getAutoSelectAudio());
        $this->assertEquals(1, $profile->getDefaultAudioAccessibility());
        $this->assertEquals('en', $profile->getDefaultAudioLanguage());
        $this->assertEquals(['en', 'es'], $profile->getDefaultAudioLanguages());
        $this->assertEquals('en', $profile->getDefaultSubtitleLanguage());
        $this->assertEquals(['en', 'es'], $profile->getDefaultSubtitleLanguages());
        $this->assertEquals(1, $profile->getAutoSelectSubtitle());
        $this->assertEquals(2, $profile->getDefaultSubtitleAccessibility());
        $this->assertEquals(1, $profile->getDefaultSubtitleForced());
        $this->assertEquals(1, $profile->getWatchedIndicator());
        $this->assertEquals(1, $profile->getMediaReviewsVisibility());
        $this->assertEquals(['en', 'fr'], $profile->getMediaReviewsLanguages());

        $subscription = $response->getSubscription();
        $this->assertTrue($subscription->isActive());
        $this->assertEquals('2025-01-01', $subscription->getSubscribedAt());
        $this->assertEquals('active', $subscription->getStatus());
        $this->assertEquals('paypal', $subscription->getPaymentService());
        $this->assertEquals('premium', $subscription->getPlan());
        $this->assertEquals(['feature1', 'feature2'], $subscription->getFeatures());

        $subscriptions = $response->getSubscriptions();
        $this->assertCount(1, $subscriptions);

        $sub = $subscriptions[0];
        $this->assertTrue($sub->isActive());
        $this->assertEquals('2025-01-01', $sub->getSubscribedAt());
        $this->assertEquals('active', $sub->getStatus());
        $this->assertEquals('paypal', $sub->getPaymentService());
        $this->assertEquals('premium', $sub->getPlan());
        $this->assertEquals(['feature1', 'feature2'], $sub->getFeatures());
    }
}