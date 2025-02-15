<?php

namespace Hester60\PlexApiPhp\Api\PlexTV\Responses\ResourceConnection;

interface ResourceConnectionInterface
{
    public function getProtocol(): ?string;
    public function getAddress(): ?string;
    public function getPort(): ?int;
    public function getUri(): ?string;
    public function isLocal(): ?bool;
    public function isRelay(): ?bool;
    public function isIPv6(): ?bool;
}
