<?php

namespace Hester60\PlexApiPhp\Api;

use DateMalformedStringException;
use Hester60\PlexApiPhp\Exceptions\DeserializeException;
use Hester60\PlexApiPhp\Exceptions\PlexApiExceptionInterface;

interface PlexApiRequestInterface
{
    /**
     * Get the HTTP method used for the API request (e.g., GET, POST, PUT, DELETE).
     *
     * @return string The HTTP method as a string.
     */
    public function getMethod(): string;

    /**
     * Get the URL for the API request.
     *
     * @return string The complete API endpoint URL.
     */
    public function getUrl(): string;

    /**
     * Get the parameters required for the API request.
     *
     * @return array<string, mixed> An associative array of request parameters (e.g., headers, query params, body).
     */
    public function getParams(): array;

    /**
     * Deserialize the API response data into an appropriate format or object.
     *
     * @param mixed $data The raw response data to be deserialized.
     *
     * @return mixed The deserialized data in the expected format.
     *
     * @throws DeserializeException If an error occurs during the deserialization process.
     * @throws DateMalformedStringException if an error occurs during date formating.
     */
    public function deserializeResponse(mixed $data): mixed;

    /**
     * Handle API request exceptions based on HTTP status codes.
     *
     * If the API response contains an error status code (e.g., 4xx or 5xx),
     * this method is responsible for throwing the appropriate exception.
     *
     * @param int $statusCode The HTTP status code returned by the API.
     * @param string|null $message An optional error message from the API response.
     *
     * @throws PlexApiExceptionInterface If a Plex API-specific error occurs.
     */
    public function throwException(int $statusCode, ?string $message = null): void;
}
