<?php

namespace Hester60\PlexApiPhp\Api\PlexTV\Responses\GetUserResponse;

use DateMalformedStringException;
use DateTimeImmutable;
use Hester60\PlexApiPhp\Api\PlexTV\Responses\UserProfile\UserProfile;
use Hester60\PlexApiPhp\Api\PlexTV\Responses\UserProfile\UserProfileInterface;
use Hester60\PlexApiPhp\Api\PlexTV\Responses\UserSubscription\UserSubscription;
use Hester60\PlexApiPhp\Api\PlexTV\Responses\UserSubscription\UserSubscriptionInterface;

final class GetUserResponse implements GetUserResponseInterface
{
    private ?int $id;
    private ?string $uuid;
    private ?string $username;
    private ?string $title;
    private ?string $email;
    private ?string $friendlyName;
    private ?string $locale;
    private ?bool $confirmed;
    private ?DateTimeImmutable $joinedAt;
    private ?bool $emailOnlyAuth;
    private ?bool $hasPassword;
    private ?bool $protected;
    private ?string $thumb;
    private ?string $authToken;
    private ?string $country;
    private ?UserSubscriptionInterface $subscription;
    /** @var UserSubscription[]  */
    private array $subscriptions;
    private ?UserProfileInterface $profile;

    /**
     * @param array<string, mixed> $data
     * @throws DateMalformedStringException
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->uuid = $data['uuid'] ?? null;
        $this->username = $data['username'] ?? null;
        $this->title = $data['title'] ?? null;
        $this->email = $data['email'] ?? null;
        $this->friendlyName = $data['friendlyName'] ?? null;
        $this->locale = $data['locale'] ?? null;
        $this->confirmed = $data['confirmed'] ?? null;
        $this->joinedAt = isset($data['joinedAt']) ? new DateTimeImmutable('@' . $data['joinedAt']) : null;
        $this->emailOnlyAuth = $data['emailOnlyAuth'] ?? null;
        $this->hasPassword = $data['hasPassword'] ?? null;
        $this->protected = $data['protected'] ?? null;
        $this->thumb = $data['thumb'] ?? null;
        $this->authToken = $data['authToken'] ?? null;
        $this->country = $data['country'] ?? null;
        $this->profile = isset($data['profile']) ? new UserProfile($data['profile']) : null;
        $this->subscription = isset($data['subscription']) ? new UserSubscription($data['subscription']) : null;

        $this->subscriptions = isset($data['subscriptions']) && is_array($data['subscriptions'])
            ? array_map(static fn($sub) => new UserSubscription($sub), $data['subscriptions'])
            : [];
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getFriendlyName(): ?string
    {
        return $this->friendlyName;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function isConfirmed(): ?bool
    {
        return $this->confirmed;
    }

    public function getJoinedAt(): ?DateTimeImmutable
    {
        return $this->joinedAt;
    }

    public function isEmailOnlyAuth(): ?bool
    {
        return $this->emailOnlyAuth;
    }

    public function hasPassword(): ?bool
    {
        return $this->hasPassword;
    }

    public function isProtected(): ?bool
    {
        return $this->protected;
    }

    public function getThumb(): ?string
    {
        return $this->thumb;
    }

    public function getAuthToken(): ?string
    {
        return $this->authToken;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function getSubscription(): ?UserSubscriptionInterface
    {
        return $this->subscription;
    }

    public function getSubscriptions(): array
    {
        return $this->subscriptions;
    }

    public function getProfile(): ?UserProfileInterface
    {
        return $this->profile;
    }
}
