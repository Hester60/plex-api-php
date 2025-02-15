<?php

namespace Hester60\PlexApiPhp\Api\PlexTV\Requests;

use Hester60\PlexApiPhp\Api\AbstractPlexApiRequest;
use Hester60\PlexApiPhp\Api\PlexTV\Responses\GetResourcesResponse\GetResourcesResponse;
use Hester60\PlexApiPhp\Api\PlexTV\Responses\GetResourcesResponse\GetResourcesResponseInterface;
use Hester60\PlexApiPhp\Constants\PlexHeaders;
use Hester60\PlexApiPhp\Exceptions\GetResourcesException;

final class GetResources extends AbstractPlexApiRequest
{
    protected const string ENDPOINT = '/resources';
    private string $authToken;
    private string $plexClientIdentifier;
    private bool $includeHttps;

    public function __construct(
        string $baseUrl,
        string $authToken,
        string $plexClientIdentifier,
        ?bool $includeHttps = false
    ) {
        parent::__construct($baseUrl);

        $this->authToken = $authToken;
        $this->plexClientIdentifier = $plexClientIdentifier;
        $this->includeHttps = $includeHttps;
    }

    public function getParams(): array
    {
        $query = [
            PlexHeaders::PLEX_TOKEN => $this->authToken,
            PlexHeaders::PLEX_CLIENT_IDENTIFIER => $this->plexClientIdentifier,
            'includeHttps' => $this->includeHttps ? '1' : '0',
        ];

        return [
            'query' => $query,
        ];
    }

    public function deserializeResponse(mixed $data): GetResourcesResponseInterface
    {
        return new GetResourcesResponse($data);
    }

    public function throwException(int $statusCode, ?string $message = null): void
    {
        throw new GetResourcesException($statusCode, $message);
    }
}
