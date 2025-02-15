<?php

namespace Hester60\PlexApiPhp\Api\PlexTV;

use GuzzleHttp\Exception\GuzzleException;
use Hester60\PlexApiPhp\Api\PlexTV\Requests\GetAuthPin;
use Hester60\PlexApiPhp\Api\PlexTV\Requests\GetResources;
use Hester60\PlexApiPhp\Api\PlexTV\Requests\GetServer;
use Hester60\PlexApiPhp\Api\PlexTV\Requests\GetTokenByPinId;
use Hester60\PlexApiPhp\Api\PlexTV\Requests\GetUser;
use Hester60\PlexApiPhp\Api\PlexTV\Responses\GetPinResponse\GetPinResponseInterface;
use Hester60\PlexApiPhp\Api\PlexTV\Responses\GetResourcesResponse\GetResourcesResponseInterface;
use Hester60\PlexApiPhp\Api\PlexTV\Responses\GetServerResponse\GetServerResponseInterface;
use Hester60\PlexApiPhp\Api\PlexTV\Responses\GetUserResponse\GetUserResponseInterface;
use Hester60\PlexApiPhp\Exceptions\DeserializeException;
use Hester60\PlexApiPhp\Exceptions\PlexApiExceptionInterface;
use Hester60\PlexApiPhp\PlexClient;
use JsonException;

final class PlexTV
{
    private const string BASE_URL = 'https://plex.tv/api/v2';
    private PlexClient $plexClient;

    /**
     * Constructor for the PlexTV class.
     *
     * @param PlexClient $plexClient An instance of PlexClient for making HTTP requests.
     */
    public function __construct(PlexClient $plexClient)
    {
        $this->plexClient = $plexClient;
    }

    /**
     * Create an authentication PIN from Plex, used for client authentication.
     *
     * @param string $plexClientIdentifier Unique identifier for the Plex client.
     * @param string $plexProduct Name of the Plex product making the request.
     * @param bool $strong Whether to return strong code (default: true).
     *
     * @return GetPinResponseInterface The response containing the authentication PIN.
     *
     * @throws GuzzleException If an HTTP request error occurs.
     * @throws JsonException If an error occurs while decoding the JSON response.
     * @throws PlexApiExceptionInterface If the API returns an error.
     * @throws DeserializeException If deserialization of the response fails.
     */
    public function getAuthPin(
        string $plexClientIdentifier,
        string $plexProduct,
        bool $strong = true
    ): GetPinResponseInterface {
        $getAuthPinRequest = new GetAuthPin(self::BASE_URL, $plexClientIdentifier, $plexProduct, $strong);

        return $this->plexClient->makeRequest($getAuthPinRequest);
    }

    /**
     * Retrieves an authentication token using a previously generated PIN ID.
     *
     * @param string $pinId The PIN ID obtained from getAuthPin().
     * @param string $plexClientIdentifier Unique identifier for the Plex client.
     *
     * @return GetPinResponseInterface The response containing the authentication token.
     *
     * @throws GuzzleException If an HTTP request error occurs.
     * @throws JsonException If an error occurs while decoding the JSON response.
     * @throws PlexApiExceptionInterface If the API returns an error.
     * @throws DeserializeException If deserialization of the response fails.
     */
    public function getTokenByPinId(string $pinId, string $plexClientIdentifier): GetPinResponseInterface
    {
        $getTokenByPinRequest = new GetTokenByPinId(self::BASE_URL, $pinId, $plexClientIdentifier);

        return $this->plexClient->makeRequest($getTokenByPinRequest);
    }

    /**
     * Retrieves information about the currently authenticated Plex user.
     *
     * @param string $authToken The authentication token obtained after login.
     *
     * @return GetUserResponseInterface The response containing user details.
     *
     * @throws DeserializeException If deserialization of the response fails.
     * @throws GuzzleException If an HTTP request error occurs.
     * @throws PlexApiExceptionInterface If the API returns an error.
     * @throws JsonException If an error occurs while decoding the JSON response.
     */
    public function getUser(string $authToken): GetUserResponseInterface
    {
        $getUserRequest = new GetUser(self::BASE_URL, $authToken);

        return $this->plexClient->makeRequest($getUserRequest);
    }

    /**
     * Retrieves a list of available Plex resources associated with the user.
     *
     * @param string $authToken The authentication token obtained after login.
     * @param string $plexClientIdentifier Unique identifier for the Plex client.
     * @param bool|null $includeHttps Whether to include HTTPS-based resources (default: false).
     *
     * @return GetResourcesResponseInterface The response containing the list of available resources.
     *
     * @throws DeserializeException If deserialization of the response fails.
     * @throws GuzzleException If an HTTP request error occurs.
     * @throws JsonException If an error occurs while decoding the JSON response.
     */
    public function getResources(
        string $authToken,
        string $plexClientIdentifier,
        ?bool $includeHttps = false
    ): GetResourcesResponseInterface {
        $getResourcesRequest = new GetResources(self::BASE_URL, $authToken, $plexClientIdentifier, $includeHttps);

        return $this->plexClient->makeRequest($getResourcesRequest);
    }

    /**
     * Retrieves details about a specific Plex server.
     *
     * @param string $authToken The authentication token obtained after login.
     * @param string $machineId The unique identifier of the Plex server.
     *
     * @return GetServerResponseInterface The response containing server details.
     *
     * @throws DeserializeException If deserialization of the response fails.
     * @throws GuzzleException If an HTTP request error occurs.
     * @throws JsonException If an error occurs while decoding the JSON response.
     */
    public function getServer(string $authToken, string $machineId): GetServerResponseInterface
    {
        $getServerRequest = new GetServer(self::BASE_URL, $authToken, $machineId);

        return $this->plexClient->makeRequest($getServerRequest);
    }
}
