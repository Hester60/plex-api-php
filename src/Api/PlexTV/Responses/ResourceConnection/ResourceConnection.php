<?php

namespace Hester60\PlexApiPhp\Api\PlexTV\Responses\ResourceConnection;

class ResourceConnection implements ResourceConnectionInterface
{
    private ?string $protocol;
    private ?string $address;
    private ?int $port;
    private ?string $uri;
    private ?bool $local;
    private ?bool $relay;
    private ?bool $IPv6;

    /**
     * @param array<string, mixed> $data
     */
    public function __construct(array $data)
    {
        $this->protocol = $data['protocol'] ?? null;
        $this->address = $data['address'] ?? null;
        $this->port = $data['port'] ?? null;
        $this->uri = $data['uri'] ?? null;
        $this->local = $data['local'] ?? null;
        $this->relay = $data['relay'] ?? null;
        $this->IPv6 = $data['IPv6'] ?? null;
    }

    public function getProtocol(): ?string
    {
        return $this->protocol;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function getPort(): ?int
    {
        return $this->port;
    }

    public function getUri(): ?string
    {
        return $this->uri;
    }

    public function isLocal(): ?bool
    {
        return $this->local;
    }

    public function isRelay(): ?bool
    {
        return $this->relay;
    }

    public function isIPv6(): ?bool
    {
        return $this->IPv6;
    }
}
