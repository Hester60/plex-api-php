<?php

namespace Hester60\PlexApiPhp\Api\PlexTV\Responses\GetPinResponse;

use DateMalformedStringException;
use DateTimeImmutable;
use Hester60\PlexApiPhp\Api\PlexTV\Responses\Location\Location;
use Hester60\PlexApiPhp\Api\PlexTV\Responses\Location\LocationInterface;

class GetPinResponse implements GetPinResponseInterface
{
    private ?int $id;
    private ?string $code;
    private ?string $product;
    private ?bool $trusted;
    private ?string $qr;
    private ?string $clientIdentifier;
    private ?LocationInterface $location;
    private ?int $expiresIn;
    private ?DateTimeImmutable $createdAt;
    private ?DateTimeImmutable $expiresAt;
    private ?string $authToken;
    private ?bool $newRegistration;

    /**
     * @param array<string, mixed> $data
     * @throws DateMalformedStringException
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->code = $data['code'] ?? null;
        $this->product = $data['product'] ?? null;
        $this->trusted = $data['trusted'] ?? null;
        $this->qr = $data['qr'] ?? null;
        $this->clientIdentifier = $data['clientIdentifier'] ?? null;
        $this->location = isset($data['location']) ? new Location($data['location']) : null;
        $this->expiresIn = $data['expiresIn'] ?? null;
        $this->createdAt = isset($data['createdAt']) ? new DateTimeImmutable($data['createdAt']) : null;
        $this->expiresAt = isset($data['expiresAt']) ? new DateTimeImmutable($data['expiresAt']) : null;
        $this->authToken = $data['authToken'] ?? null;
        $this->newRegistration = $data['newRegistration'] ?? null;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function getProduct(): ?string
    {
        return $this->product;
    }

    public function isTrusted(): ?bool
    {
        return $this->trusted;
    }

    public function getQrUrl(): ?string
    {
        return $this->qr;
    }

    public function getClientIdentifier(): ?string
    {
        return $this->clientIdentifier;
    }

    public function getLocation(): ?LocationInterface
    {
        return $this->location;
    }

    public function getExpiresIn(): ?int
    {
        return $this->expiresIn;
    }

    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getExpiresAt(): ?DateTimeImmutable
    {
        return $this->expiresAt;
    }

    public function getAuthToken(): ?string
    {
        return $this->authToken;
    }

    public function isNewRegistration(): ?bool
    {
        return $this->newRegistration;
    }
}
