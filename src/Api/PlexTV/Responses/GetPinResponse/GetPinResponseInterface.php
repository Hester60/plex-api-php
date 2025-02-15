<?php

namespace Hester60\PlexApiPhp\Api\PlexTV\Responses\GetPinResponse;

use Hester60\PlexApiPhp\Api\PlexTV\Responses\Location\LocationInterface;

interface GetPinResponseInterface
{
    public function getId(): ?int;

    public function getCode(): ?string;

    public function getProduct(): ?string;

    public function isTrusted(): ?bool;

    public function getQrUrl(): ?string;

    public function getClientIdentifier(): ?string;

    public function getLocation(): ?LocationInterface;

    public function getExpiresIn(): ?int;

    public function getCreatedAt(): ?\DateTimeImmutable;

    public function getExpiresAt(): ?\DateTimeImmutable;

    public function getAuthToken(): ?string;

    public function isNewRegistration(): ?bool;
}
