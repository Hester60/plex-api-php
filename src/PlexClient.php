<?php

namespace Hester60\PlexApiPhp;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Hester60\PlexApiPhp\Api\PlexApiRequestInterface;
use Hester60\PlexApiPhp\Api\PlexTV\PlexTV;
use Hester60\PlexApiPhp\Deserializer\Deserializer;
use Hester60\PlexApiPhp\Exceptions\DeserializeException;
use Hester60\PlexApiPhp\Exceptions\PlexApiExceptionInterface;
use JsonException;

class PlexClient
{
    private Client $httpClient;
    public PlexTV $plexTV;

    public function __construct()
    {
        $headers = [
            'Accept' => 'application/json',
        ];

        $this->httpClient = new Client([
            'headers' => $headers,
        ]);

        $this->plexTV = new PlexTV($this);
    }

    /**
     * Makes an API request using the parameters defined in the PlexApiRequestInterface.
     *
     * @param PlexApiRequestInterface $apiRequest The interface defining the API request to send.
     *
     * @return mixed The data returned by the API after being deserialized.
     *
     * @throws GuzzleException If an error occurs during the HTTP request.
     * @throws JsonException If an error occurs during JSON decoding.
     * @throws PlexApiExceptionInterface If a Plex API specific exception is thrown.
     * @throws DeserializeException If an error occurs during response deserialization.
     */
    public function makeRequest(PlexApiRequestInterface $apiRequest): mixed
    {
        $response = $this->httpClient->request(
            $apiRequest->getMethod(),
            $apiRequest->getUrl(),
            $apiRequest->getParams()
        );

        $statusCode = $response->getStatusCode();

        if ($statusCode >= 400 && $statusCode < 600) {
            $apiRequest->throwException(
                $statusCode,
                json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR)
            );
        }

        $data = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

        try {
            return Deserializer::deserialize($data, [$apiRequest, 'deserializeResponse']);
        } catch (Exception $exception) {
            throw new DeserializeException($exception->getMessage());
        }
    }
}
