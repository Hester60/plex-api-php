<?php

namespace Hester60\PlexApiPhp\Api\PlexTV\Responses\Resource;

use Hester60\PlexApiPhp\Api\PlexTV\Responses\ResourceConnection\ResourceConnection;
use Hester60\PlexApiPhp\Api\PlexTV\Responses\ResourceConnection\ResourceConnectionInterface;

class Resource implements ResourceInterface
{
    private ?string $name;
    private ?string $product;
    private ?string $productVersion;
    private ?string $platform;
    private ?string $platformVersion;
    private ?string $device;
    private ?string $clientIdentifier;
    private ?string $createdAt;
    private ?string $lastSeenAt;
    private ?string $provides;
    private ?string $ownerId;
    private ?string $sourceTitle;
    private ?string $publicAddress;
    private ?string $accessToken;
    private ?bool $owned;
    private ?bool $home;
    private ?bool $synced;
    private ?bool $relay;
    private ?bool $presence;
    private ?bool $httpsRequired;
    private ?bool $publicAddressMatches;
    private ?bool $dnsRebindingProtection;
    private ?bool $natLoopbackSupported;
    private ?ResourceConnectionInterface $connection;
    /** @var ResourceConnection[] */
    private array $connections;

    /**
     * @param array<string, mixed> $data
     */
    public function __construct(array $data)
    {
        $this->name = $data['name'] ?? null;
        $this->product = $data['product'] ?? null;
        $this->productVersion = $data['productVersion'] ?? null;
        $this->platform = $data['platform'] ?? null;
        $this->platformVersion = $data['platformVersion'] ?? null;
        $this->device = $data['device'] ?? null;
        $this->clientIdentifier = $data['clientIdentifier'] ?? null;
        $this->createdAt = $data['createdAt'] ?? null;
        $this->lastSeenAt = $data['lastSeenAt'] ?? null;
        $this->provides = $data['provides'] ?? null;
        $this->ownerId = $data['ownerId'] ?? null;
        $this->sourceTitle = $data['sourceTitle'] ?? null;
        $this->publicAddress = $data['publicAddress'] ?? null;
        $this->accessToken = $data['accessToken'] ?? null;
        $this->owned = $data['owned'] ?? null;
        $this->home = $data['home'] ?? null;
        $this->synced = $data['synced'] ?? null;
        $this->relay = $data['relay'] ?? null;
        $this->presence = $data['presence'] ?? null;
        $this->httpsRequired = $data['httpsRequired'] ?? null;
        $this->publicAddressMatches = $data['publicAddressMatches'] ?? null;
        $this->dnsRebindingProtection = $data['dnsRebindingProtection'] ?? null;
        $this->natLoopbackSupported = $data['natLoopbackSupported'] ?? null;
        $this->connection = isset($data['connection']) ? new ResourceConnection($data['connection']) : null;
        $this->connections = isset($data['connections']) && is_array($data['connections'])
            ? array_map(fn($connectionData) => new ResourceConnection($connectionData), $data['connections'])
            : [];
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getProduct(): ?string
    {
        return $this->product;
    }

    public function getProductVersion(): ?string
    {
        return $this->productVersion;
    }

    public function getPlatform(): ?string
    {
        return $this->platform;
    }

    public function getPlatformVersion(): ?string
    {
        return $this->platformVersion;
    }

    public function getDevice(): ?string
    {
        return $this->device;
    }

    public function getClientIdentifier(): ?string
    {
        return $this->clientIdentifier;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function getLastSeenAt(): ?string
    {
        return $this->lastSeenAt;
    }

    public function getProvides(): ?string
    {
        return $this->provides;
    }

    public function getOwnerId(): ?string
    {
        return $this->ownerId;
    }

    public function getSourceTitle(): ?string
    {
        return $this->sourceTitle;
    }

    public function getPublicAddress(): ?string
    {
        return $this->publicAddress;
    }

    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    public function isOwned(): ?bool
    {
        return $this->owned;
    }

    public function isHome(): ?bool
    {
        return $this->home;
    }

    public function isSynced(): ?bool
    {
        return $this->synced;
    }

    public function isRelay(): ?bool
    {
        return $this->relay;
    }

    public function isPresence(): ?bool
    {
        return $this->presence;
    }

    public function isHttpsRequired(): ?bool
    {
        return $this->httpsRequired;
    }

    public function isPublicAddressMatches(): ?bool
    {
        return $this->publicAddressMatches;
    }

    public function isDnsRebindingProtection(): ?bool
    {
        return $this->dnsRebindingProtection;
    }

    public function isNatLoopbackSupported(): ?bool
    {
        return $this->natLoopbackSupported;
    }

    public function getConnection(): ?ResourceConnectionInterface
    {
        return $this->connection;
    }

    public function getConnections(): array
    {
        return $this->connections;
    }
}
