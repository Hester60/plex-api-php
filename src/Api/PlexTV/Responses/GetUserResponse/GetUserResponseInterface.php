<?php

namespace Hester60\PlexApiPhp\Api\PlexTV\Responses\GetUserResponse;

use DateTimeImmutable;
use Hester60\PlexApiPhp\Api\PlexTV\Responses\UserProfile\UserProfileInterface;
use Hester60\PlexApiPhp\Api\PlexTV\Responses\UserSubscription\UserSubscription;
use Hester60\PlexApiPhp\Api\PlexTV\Responses\UserSubscription\UserSubscriptionInterface;

interface GetUserResponseInterface
{
    public function getId(): ?int;
    public function getUuid(): ?string;
    public function getUsername(): ?string;
    public function getTitle(): ?string;
    public function getEmail(): ?string;
    public function getFriendlyName(): ?string;
    public function getLocale(): ?string;
    public function isConfirmed(): ?bool;
    public function getJoinedAt(): ?DateTimeImmutable;
    public function isEmailOnlyAuth(): ?bool;
    public function hasPassword(): ?bool;
    public function isProtected(): ?bool;
    public function getThumb(): ?string;
    public function getAuthToken(): ?string;
    public function getCountry(): ?string;
    public function getSubscription(): ?UserSubscriptionInterface;

    /**
     * @return UserSubscription[]
     */
    public function getSubscriptions(): array;
    public function getProfile(): ?UserProfileInterface;
}
