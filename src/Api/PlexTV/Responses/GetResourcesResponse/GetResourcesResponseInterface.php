<?php

namespace Hester60\PlexApiPhp\Api\PlexTV\Responses\GetResourcesResponse;

use Hester60\PlexApiPhp\Api\PlexTV\Responses\Resource\ResourceInterface;

interface GetResourcesResponseInterface
{
    /**
     * @return ResourceInterface[]
     */
    public function getResources(): array;
}
