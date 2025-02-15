<?php

namespace Hester60\PlexApiPhp\Api\PlexTV\Responses\ServerLibrary;

interface ServerLibraryInterface
{
    public function getId(): ?int;
    public function getKey(): ?int;
    public function getTitle(): ?string;
    public function getType(): ?string;
}
