<?php

namespace Hester60\PlexApiPhp\Api\PlexTV\Responses\GetServerResponse;

use Hester60\PlexApiPhp\Api\PlexTV\Responses\ServerLibrary\ServerLibrary;

class GetServerResponse implements GetServerResponseInterface
{
    private ?string $name;
    private ?string $address;
    private ?int $port;
    private ?string $version;
    private ?string $scheme;
    private ?bool $synced;
    private ?bool $owned;
    private ?string $localAddresses;
    private ?string $machineIdentifier;
    private ?int $createdAt;
    private ?int $updatedAt;
    /** @var ServerLibrary[] */
    private array $librarySections;

    /**
     * @param array<string, mixed> $data
     */
    public function __construct(array $data)
    {
        $this->name = $data['name'] ?? null;
        $this->address = $data['address'] ?? null;
        $this->port = $data['port'] ?? null;
        $this->version = $data['version'] ?? null;
        $this->scheme = $data['scheme'] ?? null;
        $this->synced = $data['synced'] ?? null;
        $this->owned = $data['owned'] ?? null;
        $this->localAddresses = $data['localAddresses'] ?? null;
        $this->machineIdentifier = $data['machineIdentifier'] ?? null;
        $this->createdAt = $data['createdAt'] ?? null;
        $this->updatedAt = $data['updatedAt'] ?? null;
        $this->librarySections = isset($data['librarySections'])
            ? array_map(static fn($section) => new ServerLibrary($section), $data['librarySections'])
            : [];
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function getPort(): ?int
    {
        return $this->port;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function getScheme(): ?string
    {
        return $this->scheme;
    }

    public function isSynced(): ?bool
    {
        return $this->synced;
    }

    public function isOwned(): ?bool
    {
        return $this->owned;
    }

    public function getLocalAddresses(): ?string
    {
        return $this->localAddresses;
    }

    public function getMachineIdentifier(): ?string
    {
        return $this->machineIdentifier;
    }

    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?int
    {
        return $this->updatedAt;
    }

    public function getLibrarySections(): array
    {
        return $this->librarySections;
    }
}
