<?php

namespace Hester60\PlexApiPhp\Api\PlexTV\Responses\GetResourcesResponse;

use Hester60\PlexApiPhp\Api\PlexTV\Responses\Resource\Resource;
use Hester60\PlexApiPhp\Api\PlexTV\Responses\Resource\ResourceInterface;

class GetResourcesResponse implements GetResourcesResponseInterface
{
    /** @var Resource[]  */
    private array $resources;

    /**
     * @param array<array<string, mixed>> $data
     */
    public function __construct(array $data)
    {
        $this->resources = array_map(static fn($resourceData) => new Resource($resourceData), $data);
    }

    /**
     * @return ResourceInterface[]
     */
    public function getResources(): array
    {
        return $this->resources;
    }
}
