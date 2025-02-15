<?php

namespace Hester60\PlexApiPhp\Api\PlexTV\Responses\GetServerResponse;

use Hester60\PlexApiPhp\Api\PlexTV\Responses\ServerLibrary\ServerLibraryInterface;

interface GetServerResponseInterface
{
    public function getName(): ?string;
    public function getAddress(): ?string;
    public function getPort(): ?int;
    public function getVersion(): ?string;
    public function getScheme(): ?string;
    public function isSynced(): ?bool;
    public function isOwned(): ?bool;
    public function getLocalAddresses(): ?string;
    public function getMachineIdentifier(): ?string;
    public function getCreatedAt(): ?int;
    public function getUpdatedAt(): ?int;

    /**
     * @return array<ServerLibraryInterface>
     */
    public function getLibrarySections(): array;
}
