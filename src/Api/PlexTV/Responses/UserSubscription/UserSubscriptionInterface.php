<?php

namespace Hester60\PlexApiPhp\Api\PlexTV\Responses\UserSubscription;

interface UserSubscriptionInterface
{
    public function isActive(): ?bool;
    public function getSubscribedAt(): ?string;
    public function getStatus(): ?string;
    public function getPaymentService(): ?string;
    public function getPlan(): ?string;

    /**
     * @return array<string>|null
     */
    public function getFeatures(): ?array;
}
