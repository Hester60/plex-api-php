<?php

namespace Hester60\PlexApiPhp\Api\PlexTV\Requests;

use Hester60\PlexApiPhp\Api\AbstractPlexApiRequest;
use Hester60\PlexApiPhp\Api\PlexTV\Responses\GetPinResponse\GetPinResponse;
use Hester60\PlexApiPhp\Api\PlexTV\Responses\GetPinResponse\GetPinResponseInterface;
use Hester60\PlexApiPhp\Constants\PlexHeaders;
use Hester60\PlexApiPhp\Exceptions\GetAuthPinException;

final class GetAuthPin extends AbstractPlexApiRequest
{
    protected const string ENDPOINT = '/pins';
    protected const string METHOD = 'POST';
    private bool $strong;
    private string $plexClientIdentifier;
    private string $plexProduct;

    public function __construct(string $baseUrl, string $plexClientIdentifier, string $plexProduct, bool $strong = true)
    {
        parent::__construct($baseUrl);

        $this->plexClientIdentifier = $plexClientIdentifier;
        $this->plexProduct = $plexProduct;
        $this->strong = $strong;
    }

    public function getParams(): array
    {
        $query = [
            'strong' => $this->strong ? 'true' : 'false',
            PlexHeaders::PLEX_PRODUCT => $this->plexProduct,
            PlexHeaders::PLEX_CLIENT_IDENTIFIER => $this->plexClientIdentifier,
        ];

        return [
            'query' => $query,
        ];
    }

    public function deserializeResponse(mixed $data): GetPinResponseInterface
    {
        return new GetPinResponse($data);
    }

    public function throwException(int $statusCode, ?string $message = null): void
    {
        throw new GetAuthPinException($statusCode, $message);
    }
}
