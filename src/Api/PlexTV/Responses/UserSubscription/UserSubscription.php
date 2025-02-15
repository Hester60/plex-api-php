<?php

namespace Hester60\PlexApiPhp\Api\PlexTV\Responses\UserSubscription;

class UserSubscription implements UserSubscriptionInterface
{
    private ?bool $active;
    private ?string $subscribedAt;
    private ?string $status;
    private ?string $paymentService;
    private ?string $plan;
    /** @var array<string>|null  */
    private ?array $features;

    /**
     * @param array<string, mixed> $data
     */
    public function __construct(array $data)
    {
        $this->active = $data['active'] ?? null;
        $this->subscribedAt = $data['subscribedAt'] ?? null;
        $this->status = $data['status'] ?? null;
        $this->paymentService = $data['paymentService'] ?? null;
        $this->plan = $data['plan'] ?? null;
        $this->features = $data['features'] ?? null;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function getSubscribedAt(): ?string
    {
        return $this->subscribedAt;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function getPaymentService(): ?string
    {
        return $this->paymentService;
    }

    public function getPlan(): ?string
    {
        return $this->plan;
    }

    public function getFeatures(): ?array
    {
        return $this->features;
    }
}
