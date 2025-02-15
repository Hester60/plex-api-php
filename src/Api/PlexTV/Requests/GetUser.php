<?php

namespace Hester60\PlexApiPhp\Api\PlexTV\Requests;

use Hester60\PlexApiPhp\Api\AbstractPlexApiRequest;
use Hester60\PlexApiPhp\Api\PlexTV\Responses\GetUserResponse\GetUserResponse;
use Hester60\PlexApiPhp\Api\PlexTV\Responses\GetUserResponse\GetUserResponseInterface;
use Hester60\PlexApiPhp\Constants\PlexHeaders;
use Hester60\PlexApiPhp\Exceptions\GetUserException;

final class GetUser extends AbstractPlexApiRequest
{
    protected const string ENDPOINT = '/user';
    private string $authToken;

    public function __construct(string $baseUrl, string $authToken)
    {
        parent::__construct($baseUrl);

        $this->authToken = $authToken;
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

    public function deserializeResponse(mixed $data): GetUserResponseInterface
    {
        return new GetUserResponse($data);
    }

    public function throwException(int $statusCode, ?string $message = null): void
    {
        throw new GetUserException($statusCode, $message);
    }
}
