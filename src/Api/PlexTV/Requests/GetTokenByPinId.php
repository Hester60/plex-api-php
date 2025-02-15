<?php

namespace Hester60\PlexApiPhp\Api\PlexTV\Requests;

use DateMalformedStringException;
use Hester60\PlexApiPhp\Api\AbstractPlexApiRequest;
use Hester60\PlexApiPhp\Api\PlexTV\Responses\GetPinResponse\GetPinResponse;
use Hester60\PlexApiPhp\Api\PlexTV\Responses\GetPinResponse\GetPinResponseInterface;
use Hester60\PlexApiPhp\Constants\PlexHeaders;
use Hester60\PlexApiPhp\Exceptions\GetTokenByPinIdException;

final class GetTokenByPinId extends AbstractPlexApiRequest
{
    protected const string ENDPOINT = '/pins';
    private string $pinId;
    private string $plexClientIdentifier;

    public function __construct(string $baseUrl, string $pinId, string $plexClientIdentifier)
    {
        parent::__construct($baseUrl);

        $this->baseUrl = $baseUrl;
        $this->pinId = $pinId;
        $this->plexClientIdentifier = $plexClientIdentifier;
    }

    public function getUrl(): string
    {
        return $this->baseUrl . self::ENDPOINT . '/' . $this->pinId;
    }

    public function getParams(): array
    {
        $query = [
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
        throw new GetTokenByPinIdException($statusCode, $message);
    }
}
