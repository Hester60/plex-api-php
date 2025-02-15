<?php

namespace Hester60\PlexApiPhp\Api\PlexTV\Responses\Resource;

use Hester60\PlexApiPhp\Api\PlexTV\Responses\ResourceConnection\ResourceConnectionInterface;

interface ResourceInterface
{
    public function getName(): ?string;

    public function getProduct(): ?string;

    public function getProductVersion(): ?string;

    public function getPlatform(): ?string;

    public function getPlatformVersion(): ?string;

    public function getDevice(): ?string;

    public function getClientIdentifier(): ?string;

    public function getCreatedAt(): ?string;

    public function getLastSeenAt(): ?string;

    public function getProvides(): ?string;

    public function getOwnerId(): ?string;

    public function getSourceTitle(): ?string;

    public function getPublicAddress(): ?string;

    public function getAccessToken(): ?string;

    public function isOwned(): ?bool;

    public function isHome(): ?bool;

    public function isSynced(): ?bool;

    public function isRelay(): ?bool;

    public function isPresence(): ?bool;

    public function isHttpsRequired(): ?bool;

    public function isPublicAddressMatches(): ?bool;

    public function isDnsRebindingProtection(): ?bool;

    public function isNatLoopbackSupported(): ?bool;

    public function getConnection(): ?ResourceConnectionInterface;

    /**
     * @return array<ResourceConnectionInterface>
     */
    public function getConnections(): array;
}
