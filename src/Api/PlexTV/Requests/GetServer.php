<?php

namespace Hester60\PlexApiPhp\Api\PlexTV\Requests;

use Hester60\PlexApiPhp\Api\AbstractPlexApiRequest;
use Hester60\PlexApiPhp\Api\PlexTV\Responses\GetServerResponse\GetServerResponse;
use Hester60\PlexApiPhp\Api\PlexTV\Responses\GetServerResponse\GetServerResponseInterface;
use Hester60\PlexApiPhp\Constants\PlexHeaders;
use Hester60\PlexApiPhp\Exceptions\GetServerException;

final class GetServer extends AbstractPlexApiRequest
{
    protected const string ENDPOINT = '/servers';
    private string $authToken;
    private string $machineId;

    public function __construct(string $baseUrl, string $authToken, string $machineId)
    {
        parent::__construct($baseUrl);

        $this->authToken = $authToken;
        $this->machineId = $machineId;
    }

    public function getUrl(): string
    {
        return $this->baseUrl . self::ENDPOINT . '/' . $this->machineId;
    }

    public function getParams(): array
    {
        $query = [
            PlexHeaders::PLEX_TOKEN => $this->authToken,
        ];

        return [
            'query' => $query,
        ];
    }

    public function deserializeResponse(mixed $data): GetServerResponseInterface
    {
        return new GetServerResponse($data);
    }

    public function throwException(int $statusCode, ?string $message = null): void
    {
        throw new GetServerException($statusCode, $message);
    }
}
